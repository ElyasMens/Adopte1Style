<?php 
    require '../Includes/Auth.php';
    force_user_connexion();
?>
<head>
    <title>Créer un profil</title>
    <link rel="stylesheet" href="../Assets/CSS/CreateProfile.css">
</head>
<?php 
    require '../Includes/Elements/Headers/Header.php';
?>
<body>
    <?php 
        require '../Includes/SessionStatus.php'
    ?>

    <h2>Créer votre profil</h2>
    <form action="ProfileFunctions.php" method="post">
        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select><br><br>
        
        <label for="date_naissance">Date de naissance:</label>
        <input type="text" id="date_naissance" name="date_naissance"><br><br>
        
        <!-- Ajoutez d'autres champs pour les autres informations du profil -->
        
        <input type="hidden" name="pseudo" value="<?php echo $pseudo; ?>">
        <input type="submit" value="Enregistrer">
    </form>
    <?php 
        require '../Includes/Elements/Headers/Header.php';
    ?>
</body>
</html>