<?php
class Admin {
    public $id_admin;
    public $nom;
    public $prenom;
    public $email;
    public $url_imageadmin;
    public $role;
    private $mot_de_passe;

    // Constructeur pour récupérer les données d'un administrateur spécifique
    public function __construct($id_admin) {
        global $db;
        $this->db = $db;
        $query = "SELECT * FROM admin WHERE id_admin = ?";
        
        try {
            $stmt = $db->prepare($query);
            $stmt->execute([$id_admin]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($admin) {
                $this->id_admin = $admin['id_admin'];
                $this->nom = $admin['nom'];
                $this->prenom = $admin['prenom'];
                $this->email = $admin['email'];
                $this->url_imageadmin = $admin['url_imageadmin'];
                $this->role = $admin['role'];
                $this->mot_de_passe = $admin['mot_de_passe'];
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération de l'administrateur : " . $e->getMessage());
        }
    }

    // Méthode statique pour créer un nouvel administrateur
public static function create($nom, $prenom, $email, $url_imageadmin, $mot_de_passe, $role) {
    global $db;
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $query = "INSERT INTO admin (nom, prenom, email, url_imageadmin, mot_de_passe, role) VALUES (?, ?, ?, ?, ?, ?)";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $url_imageadmin, $hashed_password, $role]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la création de l'administrateur : " . $e->getMessage());
    }
} 

// Méthode statique pour récupérer tous les administrateurs
public static function getAll() {
    global $db;
    $query = "SELECT * FROM admin";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des administrateurs : " . $e->getMessage());
    }
}

// Mise à jour des informations d'un administrateur
public function update($nom, $prenom, $email, $url_imageadmin, $role) {
    global $db;
    $query = "UPDATE admin SET nom = ?, prenom = ?, email = ?, url_imageadmin = ?, role = ? WHERE id_admin = ?";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $url_imageadmin, $role, $this->id_admin]);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la mise à jour de l'administrateur : " . $e->getMessage());
    }
}

// Suppression d'un administrateur
public function delete() {
    global $db;
    $query = "DELETE FROM admin WHERE id_admin = ?";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$this->id_admin]);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la suppression de l'administrateur : " . $e->getMessage());
    }
}
public function getAllUsers() {
    $query = "SELECT 'Artisan' as type, nom_complet, numero, DATE(date_creation) as date_inscription FROM artisan
              UNION ALL
              SELECT 'Client' as type, nom_complet, numero, DATE(date_creation) as date_inscription FROM client
              ORDER BY date_inscription DESC";
    
    try {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
    }
}
// Connexion d'un administrateur
public static function login($email, $mot_de_passe) {
    global $db;
    $query = "SELECT * FROM admin WHERE email = ?";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin && password_verify($mot_de_passe, $admin['mot_de_passe'])) {
            return new self($admin['id_admin']);
        }
        return null;
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
    }
}

// Vérifie si l'administrateur est un super administrateur
public function isSuperAdmin() {
    return $this->role === 'super_admin';
}

// Vérifie si l'administrateur est un administrateur classique
public function isAdmin() {
    return $this->role === 'admin';
}

// Vérifie si l'administrateur est un support
public function isSupport() {
    return $this->role === 'support';
}

// Méthodes pour gérer les inscriptions
public function getInscriptionsArtisans() {
    global $db;
    $query = "SELECT COUNT(*) as count FROM artisan";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (PDOException $e) {
        throw new Exception("Erreur lors du comptage des artisans : " . $e->getMessage());
    }
}
public function countClients() {
    global $db;
    $query = "SELECT COUNT(*) as count FROM client";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (PDOException $e) {
        throw new Exception("Erreur lors du comptage des clients : " . $e->getMessage());
    }
    
}
public function getRevenusMensuels() {
        
    $query = "SELECT SUM(budget) as revenus FROM pack_publicitaire WHERE MONTH(date_debut) = MONTH(CURRENT_DATE()) AND YEAR(date_debut) = YEAR(CURRENT_DATE())";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['revenus'] ?? 0;
}

public function getInscriptionsClients() {
    global $db;
    $query = "SELECT COUNT(*) as count FROM client";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (PDOException $e) {
        throw new Exception("Erreur lors du comptage des clients : " . $e->getMessage());
    }
}

// Méthodes pour gérer les packs publicitaires
public function getPacksPublicitaires() {
    global $db;
    $query = "SELECT * FROM pack_publicitaire";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des packs publicitaires : " . $e->getMessage());
    }
}

public function createPackPublicitaire($id_profil_artisan, $titre, $pack_publicitaire, $budget, $date_debut, $date_fin) {
    global $db;
    $query = "INSERT INTO pack_publicitaire (id_profil_artisan, titre, pack_publicitaire, budget, date_debut, date_fin) VALUES (?, ?, ?, ?, ?, ?)";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id_profil_artisan, $titre, $pack_publicitaire, $budget, $date_debut, $date_fin]);
        return $db->lastInsertId();
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la création du pack publicitaire : " . $e->getMessage());
    }
}

public function updatePackPublicitaire($id_publicite, $titre, $pack_publicitaire, $budget, $date_debut, $date_fin) {
    global $db;
    $query = "UPDATE pack_publicitaire SET titre = ?, pack_publicitaire = ?, budget = ?, date_debut = ?, date_fin = ? WHERE id_publicite = ?";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$titre, $pack_publicitaire, $budget, $date_debut, $date_fin, $id_publicite]);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la mise à jour du pack publicitaire : " . $e->getMessage());
    }
}

public function deletePackPublicitaire($id_publicite) {
    global $db;
    $query = "DELETE FROM pack_publicitaire WHERE id_publicite = ?";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id_publicite]);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la suppression du pack publicitaire : " . $e->getMessage());
    }
}
}
?>