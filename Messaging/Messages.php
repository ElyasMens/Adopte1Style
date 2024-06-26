<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    require_once '../Assets/Elements/Header.php';
    is_subscriber(); 
    require_once '../Assets/Elements/Sidebar.php';
    require_once 'Manage_Messages.php';
    $connexion = Connexion();
    $contact_list = User_Contacts($username, $connexion);
    if(isset($_COOKIE['contact_username'])){
        $actual_contact = $_COOKIE['contact_username'];
        $pp_actual_contact = pp_path($actual_contact);
    }else {
        $actual_contact = NULL;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adopte1Style | Messages</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Messages.css">
    <script src="../Assets/JavaScript/Messages.js"></script>
</head>
<body>
    <section class="chat-section">
        <div class="main-container">
            <div class="rd-block"> 
                <div class="rd-block-content">
                    <button class="confirm">Envoyer</button><button onclick="Display_None()">Annuler</button>
                </div>
            </div>
            <!-- ----- -->
            <aside class="chat-sidebar">
                <div class="search-bar">
                    <input type="text" placeholder="Recherche un contact..." maxlength="20">
                </div>
                <?php if (!empty($contact_list)): ?>
                    <ul class="contact-list">
                        <?php foreach ($contact_list as $contact_username): ?>
                            <?php if (!Users_Blocked($username,$contact_username,$connexion)): ?>
                                <?php $contact_pp=pp_path($contact_username);?>
                                <li class="contact-item" onclick="Contact_Conv('<?=htmlentities($contact_username);?>','<?=htmlentities($contact_pp);?>')">
                                    <img src="<?=htmlentities($contact_pp);?>" alt="profile-img" class="contact-avatar">
                                    <div class="contact-name"><?=htmlentities($contact_username);?></div>
                                </li>  
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </aside>
            <!-- ----- -->
            <div class="chat-main">
                <div class="chat-header">
                    <?php if ($actual_contact): ?>
                        <img src="<?=htmlentities($pp_actual_contact);?>" class="chat-header-avatar"></img>
                        <div class="chat-header-name"><?=htmlentities($actual_contact);?></div>
                    <?php else: ?>
                        <img src="../Assets\Images\default.jpg" class="chat-header-avatar"></img>
                        <div class="chat-header-name"></div>
                    <?php endif; ?>
                    <?php if ($actual_contact): ?>
                    <button class="chat-header-button" id="block-button">
                        <span onclick="Display_True('Block')" class="material-symbols-outlined">
                            Block
                        </span>
                    </button>
                    <?php else: ?>
                        <button class="chat-header-button" id="block-button">
                        <span onclick="Display_True('Block')" class="material-symbols-outlined">
                            Block
                        </span>
                    <?php endif; ?>
                </div>
                <div class="chat-messages">
                </div> 
                <div class="chat-input">
                    <input type="text" id="messageInput" placeholder="Type a message..." maxlength="1000">
                    <button onclick="Send_Message()">Envoyer</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

