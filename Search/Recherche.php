
<head>
    <link rel="stylesheet" href="../Assets/CSS/Recherche.css">
    <script src="../Assets/JavaScript/Recherche.js"></script>
</head>
<body>
    <?php 
        require '../Assets/Elements/Header.php';
        require '../Assets/Elements/Sidebar.php';
        require 'Manage_Recherche.php';
    ?>
    <section class="search-section">
        <div class="main-container">
                <div class="search-bar">
                    <input id="search" type="text" name="search" placeholder="Recherche un utilisateur..." maxlength="20">
                    <button type="button" id="search-button" onclick="searchUsers()">Rechercher</button>
                </div>
                <div class="different-choice">
                    <label for="age_min">Âge min:</label>
                    <input type="number" id="age_min" name="age_min"min="18">
                    <label for="age_max">Âge max:</label>
                    <input type="number" id="age_max" name="age_max"min ="18" max="100">
                    <label for="localisation">Localisation:</label>
                    <input type="text" id="localisation" name="localisation">
                    <label for="gender">Sexe:</label>
                    <select id="gender" name="gender">
                        <option value="">Tous</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                    <label for="profession">Profession:</label>
                    <input type="text" id="profession" name="profession">
                    <label for="taille_min">Taille min. (cm):</label>
                    <input type="number" id="taille_min" name="taille_min">
                    <label for="taille_max">Taille max. (cm):</label>
                    <input type="number" id="taille_max" name="taille_max">
                    <button type="button" id="filter-button" onclick="filterUsers()">Filtrer</button>
                    </div>
            <div class="search-results">
            <?php Show_LastUsers(); ?> <!-- FunctionsSQL.php l.209 -->
            </div>
    
        </div>
    </section>
</body>
</html>
