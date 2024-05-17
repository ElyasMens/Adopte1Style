<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un profil</title>
    <link rel="stylesheet" href="../Assets/CSS/CreateProfile.css">
    <script>
        function convertDate(dateString) {
            var parts = dateString.split("-");
            return new Date(parts[0], parts[1] - 1, parts[2]);
        }

        function calculateAge(birthday) {
            var today = new Date();
            var birthDate = convertDate(birthday);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        function validateForm(event) {
            var dateNaissance = document.getElementById('date_naissance').value;
            var age = calculateAge(dateNaissance);
            if (age < 18) {
                alert("Vous devez avoir au moins 18 ans pour créer un profil.");
                event.preventDefault(); // Empêche la soumission du formulaire
                return false;
            }

            var profession = document.getElementById('profession').value;
            var letters = /^[A-Za-z]+$/;

            if (!profession.match(letters)) {
                alert("Votre profession ne peut comporter que des lettres.");
                event.preventDefault();
                return false;
            }

            return true; // Soumission du formulaire si tout est valide
        }
    </script>
</head>
<body>
    <?php require '../Includes/Elements/Headers/Header.php'; ?>
    <h2>Créer votre profil</h2>
    <form action="ProfileFunctions.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm(event)">
        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select><br><br>
        
        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>
        
        <label for="profession">Profession:</label>
        <input type="text" id="profession" name="profession" required><br><br>
        
        <label for="lieu_residence">Lieu de résidence:</label>
        <input type="text" id="lieu_residence" name="lieu_residence" placeholder="Pays, région, département, ville" required><br><br>
        
        <label for="situation_amoureuse">Situation amoureuse/familiale:</label>
        <select id="situation_amoureuse" name="situation_amoureuse" required>
            <option value="célibataire">Célibataire</option>
            <option value="en couple">En couple</option>
            <option value="marié(e)">Marié(e)</option>
            <option value="divorcé(e)">Divorcé(e)</option>
            <option value="veuf(ve)">Veuf(ve)</option>
            <option value="autre">Autre</option>
        </select><br><br>
        
        <label for="taille">Taille (cm):</label>
        <input type="number" id="taille" name="taille" required><br><br>
        
        <label for="poids">Poids (kg):</label>
        <input type="number" id="poids" name="poids" required><br><br>
        
        <label for="couleur_yeux">Couleur des yeux:</label>
        <select id="couleur_yeux" name="couleur_yeux" required>
            <option value="bleu">Bleu</option>
            <option value="vert">Vert</option>
            <option value="marron">Marron</option>
            <option value="noir">Noir</option>
            <option value="autre">Autre</option>
        </select><br><br>
        
        <label for="couleur_cheveux">Couleur des cheveux:</label>
        <select id="couleur_cheveux" name="couleur_cheveux" required>
            <option value="blond">Blond</option>
            <option value="brun">Brun</option>
            <option value="roux">Roux</option>
            <option value="noir">Noir</option>
            <option value="autre">Autre</option>
        </select><br><br>
        
        <label for="biographie">Biographie :</label>
        <textarea id="biographie" name="biographie" required></textarea><br><br>
 
        <label for="fumeur">Fumeur:</label>
        <select id="fumeur" name="fumeur">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br><br>
        
        <label for="photos">Photos:</label>
        <input type="file" id="photos" name="photos[]" multiple required><br><br>
        
        <input type="hidden" name="pseudo" value="<?php echo $pseudo; ?>">
        <input type="submit" value="Enregistrer">
    </form>
    <?php require '../Includes/Elements/Footers/Footer.php'; ?>
</body>
</html>
