function Contact_Conv(contact_username, contact_pp) {
    var chat_header_name = document.querySelector('.chat-header-name');
    var chat_header_avatar = document.querySelector('.chat-header-avatar');
    var chat_header_block = document.getElementById('block-button');

    chat_header_name.textContent = contact_username;
    chat_header_avatar.src = contact_pp;
    chat_header_block.querySelector('span').onclick = function() {
        Display_True('Block', '<?= htmlentities($actual_contact) ?>');
    };
    
    document.cookie = 'contact_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    document.cookie = 'contact_username=' + contact_username + "; path=/";
    $.ajax({
        type: 'POST',
        url: 'changeConv.php',
        data: {
            action: 'changeConv'
        },
        dataType: 'json',
        error: function(xhr, status, error) {
            console.error('Erreur lors de la requête : ' + error);
            console.log('Status: ' + status);
            console.log('Response: ' + xhr.responseText);
        }
    });
}
/*----Chargement des messages----*/
setInterval(Load_Messages, 500);
    function Load_Messages() {
        $('.chat-messages').load('Load_Messages.php');
}
/*-------------------------------*/
 function Send_Message() {
    var message = document.getElementById("messageInput").value;

    if (message.trim() !== "") {
        //console.log("Message: " + message);
        $.ajax({
            type: "POST",
            url: "Manage_Messages.php", 
            data: { message: message, action:'Send_Messages' },
            success: function(response) {
                document.getElementById("messageInput").value = "";
            },
            error: function(xhr, status, error) {
                console.error("Erreur lors de l'envoi : " + error);
                console.log("Status: " + status);
                console.log("Response: " + xhr.responseText);
            }
        });
    } /*else {
        console.error("Message vide");
    }*/
}

/*----Pour le message de confirmation signalement/supression----*/
function Display_None() {
    var Ask_blocks = document.querySelectorAll('.rd-block');
    Ask_blocks.forEach(function (Ask_block) {
        Ask_block.style.display = 'none';
    });
}

function Display_True(action, param1) {
    var Ask_blocks = document.querySelectorAll('.rd-block');
    Ask_blocks.forEach(function (Ask_block) {
        Ask_block.style.display = 'flex';
    });

    var button = document.querySelector('.confirm');
    var div_text = document.querySelector('.rd-block-content');

    if (button && div_text) {
        var param1;
        if (action === 'Delete') {
            var confirm_function = '<button class="confirm" onclick="Are_You_Sure(\'' + action + '\', \'' + param1 + '\')">Valider</button>'+
                                '<button onclick="Display_None()">Annuler</button>';
            div_text.innerHTML = '<div>Êtes-vous sûr de vouloir supprimer votre message ?</div>' + confirm_function;
        } else if (action === 'Report') {
            var confirm_function = '<button class="confirm" onclick="Are_You_Sure(\'' + action + '\')">Valider</button>'+
                                '<button onclick="Display_None()">Annuler</button>';
            var select_reason = '<select id="report-reason">' +
                             '<option value="spam">Spam</option>' +
                             '<option value="harassment">Harcèlement</option>' +
                             '<option value="hate speech">Discours haineux</option>' +
                             '<option value="other">Autre</option>' +
                             '</select>';
            div_text.innerHTML = 'Quel type de problème signalez-vous ?' + select_reason + confirm_function;
        }else if(action === 'Block'){
            var confirm_function = '<button class="confirm" onclick="Are_You_Sure(\'' + action + '\')">Valider</button>'+
            '<button onclick="Display_None()">Annuler</button>';
            div_text.innerHTML = '<div>Êtes-vous sûr de vouloir bloquer l\'utilisateur ? (action irréversible)</div>' + confirm_function;
        }
    } 
}


function Are_You_Sure(action,param1){
    Display_None();
    if (action === 'Delete'){
        var messageId = param1;
        Delete_Message(messageId);
    }else if(action === 'Report'){
        var messageId = param1;
        var reason = document.getElementById('report-reason').value;
        Report_Message(messageId, reason);
    }else if(action === 'Block'){
        Block_User();
    }
}
/*-----------------------------------------*/
function Delete_Message(messageId) { 
        if (messageId) {
            /*console.log("ID du message à supprimer : " + messageId);*/

            $.ajax({
                type: "POST",
                url: "Manage_Messages.php", 
                data: {
                    id: messageId,
                    action: 'Delete_Message'
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de la suppression : " + error);
                    console.log("Status: " + status);
                    console.log("Response: " + xhr.responseText);
                }
            });
        } 
}

function Report_Message(messageId, reason) {
    
        if (messageId && reason) {
            console.log("ID du message à signaler : " + messageId);
            console.log(reason);
            $.ajax({
                type: "POST",
                url: "Manage_Messages.php", 
                data: {
                    id: messageId, reason: reason,
                    action: 'Report_Message'
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de la suppression : " + error);
                    console.log("Status: " + status);
                    console.log("Response: " + xhr.responseText);
                }
            });
        }
    }

    
function Block_User() { 
    
        /*console.log("ID du message à supprimer : " + messageId);*/

        $.ajax({
            type: "POST",
            url: "Manage_Messages.php", 
            data: {
            
            action: 'Block_User'
            },success: function(){
                if (response.success) {
                    document.cookie = 'contact_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                    window.location.href = "../Messaging/Messages.php";
                }
            },
            error: function(xhr, status, error) {
            console.error("Erreur lors de la suppression : " + error);
            console.log("Status: " + status);
            console.log("Response: " + xhr.responseText);
            }
        });
    } 
