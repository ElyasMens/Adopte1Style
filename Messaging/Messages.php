<?php 
    if(isset($_COOKIE['user'])){
        $username = $_COOKIE['user'];
    }
    require '../Assets/Elements/Header.php';
    require '../Assets/Elements/Sidebar.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/Messages.css">
    <script src="../Assets/JavaScript/Messages.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <section class="chat-section">
        <div class="main-container">
            <!--en cas d'appel de la fonction pour le signalement/supression-->
            <div class="rd-block"> <!--rd pour report/block -->
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
                            <?php $contact_pp=pp_path($contact_username);?>
                            <li class="contact-item" onclick="Contact_Conv('<?=htmlentities($contact_username);?>','<?=htmlentities($contact_pp);?>')">
                                <img src="<?=htmlentities($contact_pp);?>" alt="profile-img" class="contact-avatar">
                                <div class="contact-name"><?=htmlentities($contact_username);?></div>
                            </li>  
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
                    <button class="chat-header-button" id="block-button" onclick="chat_option()">
                        <span class="material-symbols-outlined">
                            More_Vert
                        </span>
                    </button>
                </div>
                <div class="chat-messages">
                <!-- exemple de messages
                  <div class="message">
                        <span onclick="Display_True('Report',1)" class="material-symbols-outlined message-option">
                            Report
                        </span>
                        <div class="message-content">Hello, how are you?</div>
                    </div>
                    <div class="message own-message">
                        <div class="message-content">I'm good, thanks! How about you?</div>
                        <span onclick="Display_True('Delete',2)" class="material-symbols-outlined message-option">
                            Delete
                        </span>
                    </div> -->
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

