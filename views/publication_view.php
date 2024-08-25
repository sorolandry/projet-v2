<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php';?>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .publication-form {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        padding: 12px;
        max-width: 500px;
        margin: 0 auto;
    }

    .publication-form textarea {
        width: 100%;
        height: 250px;
        border: none;
        resize: none;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .body-containe {
        margin-top: 100px;
    }

    .bouton-ajout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background-color: #2870cfcb;
        color: white;
        border: none;
        width: 100px;
        height: 25px;
        border-radius: 6px;
        padding: 15px 16px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .publication-form textarea:focus {
        outline: none;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        border-top: 1px solid #e4e6eb;
        padding-top: 10px;
    }

    .form-actions button {
        background-color: #1877f2;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .form-actions button:disabled {
        background-color: #e4e6eb;
        color: #bcc0c4;
        cursor: not-allowed;
    }

    .date-picker {
        margin-top: 10px;
        width: 100%;
    }

    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
        border: 1px solid #e4e6eb;
        border-radius: 8px;
        padding: 10px;
        max-height: 150px;
        overflow-y: auto;
    }

    .image-preview {
        width: 70px;
        height: 70px;
        object-fit: cover;
        margin: 5px;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <?php include_once 'includes/header.php';?>

    <div id="body-containe" <form action="index.php?page=publication" method="post" enctype="multipart/form-data">

        <form action="index.php?page=publication" method="post" enctype="multipart/form-data">
            <div class="publication-form" style="width: 400px; height: 500px;">
                <textarea id="publicationContent" name="texte" placeholder="Que voulez-vous dire ?"></textarea>
                <label for="imageInput" class="image-upload">
                    <input type="file" id="imageInput" name="url_image" accept="image/*" multiple
                        style="display: none;">
                    <div class="upload-icon bouton-ajout">
                        <i class="fa-sharp-duotone fa-solid fa-image" id="icon-ajout"></i>
                        <h3>Ajouter</h3>
                    </div>
                </label>
                <input type="hidden" name="id_service" value="1"> <!-- Ajustez cette valeur selon vos besoins -->
                <div id="affichage" class=".image-preview-container"></div>
                <div class="form-actions">
                    <button id="publier" name="publier" disabled>Publier</button>
                </div>
            </div>
        </form>

    </div>
    <?php include_once 'includes/footer.php';?>
    <script>
    const publicationContent = document.getElementById('publicationContent');
    const publier = document.getElementById('publier');
    const imageInput = document.getElementById('imageInput');
    const publicationDate = document.getElementById('publicationDate');
    const affichage = document.getElementById('affichage');

    const updatePublishButtonState = () => {
        publier.disabled = !publicationContent.value.trim() && !imageInput.files.length && !publicationDate.value;
    };

    const updateImagePreview = () => {
        affichage.innerHTML = '';
        Array.from(imageInput.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = (event) => {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.classList.add('image-preview');
                affichage.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    };


    publicationContent.addEventListener('input', updatePublishButtonState);
    imageInput.addEventListener('change', () => {
        updateImagePreview();
        updatePublishButtonState();
    });
    publicationDate.addEventListener('change', updatePublishButtonState);

    publier.addEventListener('click', () => {
        const content = publicationContent.value.trim();
        const date = publicationDate.value;
        const images = imageInput.files;

        if (content || images.length || date) {
            alert(
                `Publication envoyée : ${content}\nDate de publication : ${date || 'Non spécifiée'}\nImages sélectionnées : ${images.length}`
            );
            publicationContent.value = '';
            publicationDate.value = '';
            imageInput.value = '';
            affichage.innerHTML = '';
        }
    });
    </script>
</body>

</html>