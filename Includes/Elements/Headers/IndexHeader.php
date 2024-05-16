<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Assets/CSS/Headers/IndexHeader.css">
    <script src="../Includes/JavaScript/Index.js"></script>
</head>
    <header>
        <?php if (isset($_SESSION['connected']) && ($_SESSION['connected'] === 'user' || $_SESSION['connected'] === 'subscriber')): ?>
            <script src=../Includes/JavaScript/Disconnect.js></script>
            <button onclick="Disconnect()" id="InscriptionConnexion">
                DECONNEXION
            </button>
        <?php else : ?>
            <button onclick="Reveal()" id="InscriptionConnexion">
                SE CONNECTER
            </button>
        <?php endif?>
    </header>