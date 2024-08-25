document.addEventListener('DOMContentLoaded', function() {
    const packModal = document.getElementById('packModal');
    const subscribersModal = document.getElementById('subscribersModal');
    const addPackBtn = document.getElementById('addPackBtn');
    const closeBtns = document.getElementsByClassName('close');
    const packForm = document.getElementById('packForm');

    addPackBtn.onclick = function() {
        showPackModal('Ajouter un pack');
    }

    for (let closeBtn of closeBtns) {
        closeBtn.onclick = function() {
            packModal.style.display = "none";
            subscribersModal.style.display = "none";
        }
    }

    window.onclick = function(event) {
        if (event.target == packModal) {
            packModal.style.display = "none";
        }
        if (event.target == subscribersModal) {
            subscribersModal.style.display = "none";
        }
    }

    packForm.onsubmit = function(e) {
        e.preventDefault();
        const formData = new FormData(packForm);
        const action = formData.get('id_publicite') ? 'update_pack' : 'create_pack';
        formData.append('action', action);

        fetch('index.php?page=admin', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Erreur: ' + data.message);
            }
        });
    }

    window.editPack = function(id) {
        fetch(`index.php?page=admin&action=get_pack&id=${id}`)
        .then(response => response.json())
        .then(pack => {
            showPackModal('Modifier un pack', pack);
        });
    }

    window.deletePack = function(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce pack ?')) {
            fetch('index.php?page=admin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete_pack&id_publicite=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erreur: ' + data.message);
                }
            });
        }
    }

    window.showSubscribers = function(id) {
        fetch(`index.php?page=admin&action=get_subscribers&id=${id}`)
        .then(response => response.json())
        .then(subscribers => {
            const tbody = document.getElementById('subscribersTableBody');
            tbody.innerHTML = '';
            subscribers.forEach(sub => {
                tbody.innerHTML += `
                    <tr>
                        <td>${sub.nom_complet}</td>
                        <td>${sub.email}</td>
                        <td>${sub.metier}</td>
                    </tr>
                `;
            });
            subscribersModal.style.display = "block";
        });
    }

    function showPackModal(title, pack = null) {
        document.getElementById('modalTitle').textContent = title;
        if (pack) {
            document.getElementById('packId').value = pack.id_publicite;
            document.getElementById('titre').value = pack.titre;
            document.getElementById('pack_publicitaire').value = pack.pack_publicitaire;
            document.getElementById('budget').value = pack.budget;
            document.getElementById('date_debut').value = pack.date_debut;
            document.getElementById('date_fin').value = pack.date_fin;
        } else {
            packForm.reset();
            document.getElementById('packId').value = '';
        }
        packModal.style.display = "block";
    }
});