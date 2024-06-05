function Contact_Conv(contact_username, contact_pp) {
    var chat_header_name = document.querySelector('.chat-header-name');
    var chat_header_avatar = document.querySelector('.chat-header-avatar');

    chat_header_name.textContent = contact_username;
    chat_header_avatar.src = contact_pp;
    document.cookie = 'contact_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    document.cookie = 'contact_username=' + contact_username + "; path=/";
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

function Display_True(action, messageId) {
    var Ask_blocks = document.querySelectorAll('.rd-block');
    Ask_blocks.forEach(function (Ask_block) {
        Ask_block.style.display = 'flex';
    });

    var button = document.querySelector('.confirm');
    var div_text = document.querySelector('.rd-block-content');

    if (button && div_text) {
        var confirm_function = '<button class="confirm" onclick="Are_You_Sure(\'' + action + '\', ' + messageId + ')">Valider</button>'+
                                '<button onclick="Display_None()">Annuler</button>';
        if (action === 'Delete') {
            div_text.innerHTML = '<div>Êtes-vous sûr de vouloir supprimer votre message ?</div>' + confirm_function;
        } else if (action === 'Report') {
            var select_reason = '<select id="report-reason">' +
                             '<option value="spam">Spam</option>' +
                             '<option value="harassment">Harcèlement</option>' +
                             '<option value="hate_speech">Discours haineux</option>' +
                             '<option value="other">Autre</option>' +
                             '</select>';
            div_text.innerHTML = 'Quel type de problème signalez-vous ?' + select_reason + confirm_function;
        }
    } 
}


function Are_You_Sure(action,messageId,reason){
    Display_None();
    if (action === 'Delete'){
        Delete_Message(messageId);
    }else if(action === 'Report'){
        var reason = document.getElementById('report-reason').value;
        Report_Message(messageId, reason);
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
 