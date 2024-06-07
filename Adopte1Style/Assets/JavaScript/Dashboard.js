function Load_Dashboard_Info() {
    var users = document.querySelectorAll('.user-info');

    // Parcourir tous les utilisateurs
    users.forEach(function(user) {
        var userName = user.dataset.username;
        var userId = user.dataset.id;
        var userEmail = user.dataset.email;
        var userRealname = user.dataset.realname;    

        var userInfoContent = user.querySelector('.user-info-content');
        userInfoContent.innerHTML = `id: ${userId} pseudo: ${userName} nom: ${userRealname} <br> email: ${userEmail}`;
    });

    var reports = document.querySelectorAll('.report-info');

    // Parcourir tous les rapports
    reports.forEach(function(report) {
        var userReported = report.dataset.user_reported;
        var reportId = report.dataset.id;
        var reportedBy = report.dataset.reported_by;
        var reason = report.dataset.reason;   
        var reportedMessageContent = report.dataset.message_content; 
        var reportedMessageId = report.dataset.message_id;

        var reportInfoContent = report.querySelector('.report-info-content');
        reportInfoContent.innerHTML = `${reportId} - ${userReported} - ${reportedBy} - ${reason} - ${reportedMessageId} - ${reportedMessageContent}`;
    });
}
document.addEventListener('DOMContentLoaded', Load_Dashboard_Info);

function confirm(action, var1, var2){
    if(action){
        var Ask_blocks = document.querySelectorAll('.rd-block');
        Ask_blocks.forEach(function (Ask_block) {
            Ask_block.style.display = 'flex';
        });
        var div_text = document.querySelector('.rd-block-content');
        var button = document.querySelector('.confirm');

        if (action==='BanUser'){
            username = var1;
            email = var2;
            if (button && div_text) {
                var confirm_function = '<a href="Dashboard.php"><button class="confirm" onclick="Ban_user(\'' + username + '\',\''+ email+'\')">Valider</button></a>'+
                                        '<button onclick="Display_None()">Annuler</button>';
                div_text.innerHTML = '<div>Êtes-vous sûr de vouloir bannir l\'utilisateur ?</div>' + confirm_function;
            }
        }else if(action==='DeleteReport'){
            reportId = var1;
            reportedMessageId = var2;
            if (button && div_text) {
                var select_choice = '<br><select id="report-choice">' +
                             '<option value="oui">oui</option>' +
                             '<option value="non">non</option>' +
                             '</select><br>';

        var confirm_function = '<a ><button class="confirm" onclick="Remove_Report(\'' + reportId + '\',\''+ reportedMessageId +'\')">Valider</button></a>' +
                               '<button onclick="Display_None()">Annuler</button>';

        div_text.innerHTML = 'Voulez vous supprimer le message avec le signalement ?' + select_choice + confirm_function;
   }
        }
    }
}

function Ban_user(username, email) {
    if (username && email) {
        $.ajax({
            type: "POST",
            url: "UserTable.php",
            data: {
                username: username,
                email: email,
                action: 'Delete_User'
            }, 
            success: function(response) {
                if (response.success) {
                    window.location.reload();
            }},
            error: function(xhr, status, error) {
                console.error("Erreur lors de la suppression : " + error);
                console.log("Status: " + status);
                console.log("Response: " + xhr.responseText);
            }
        });
    } else {
        console.error("Nom d'utilisateur ou email manquant");
    }
}


function Remove_Report(reportId, messageId) {
    if (reportId && messageId) {
        var choice = document.getElementById('report-choice').value;
        var deleteMessage = (choice === 'oui') ? 'true' : 'false';
        console.log(deleteMessage);
        $.ajax({
            type: "POST",
            url: "ReportedUserTable.php",
            data: {
                reportId: reportId,
                messageId: messageId,
                deleteMessage: deleteMessage,
                action: 'Delete_ReportAndMessage'
            },
            success: function(response) {
                if (response.success) {
                    window.location.reload();  // Recharger la page après succès
                } else {
                    console.error("Erreur lors de la suppression : " + response.message);
                }
            },
            
        });
    } else {
        console.error("ID du signalement ou ID du message manquant");
    }
}


