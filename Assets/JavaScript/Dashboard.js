function Load_Info() {
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
        var userId = report.dataset.id;
        var reportedBy = report.dataset.reported_by;
        var reason = report.dataset.reason;   
        var messageContent = report.dataset.message_content; 
        var messageId = report.dataset.messageId;   

        var reportInfoContent = report.querySelector('.report-info-content');
        reportInfoContent.innerHTML = `${userId} - ${userReported} - ${reportedBy} - ${messageId} - ${reason} - ${messageContent}`;
    });
}

document.addEventListener('DOMContentLoaded', Load_Info);

function confirm(username, email){
    var Ask_blocks = document.querySelectorAll('.rd-block');
    Ask_blocks.forEach(function (Ask_block) {
        Ask_block.style.display = 'flex';
    });
    var button = document.querySelector('.confirm');
    var div_text = document.querySelector('.rd-block-content');
    if (button && div_text) {
        var confirm_function = '<button class="confirm" onclick="Ban_user(\'' + username + '\',\''+ email+'\')">Valider</button>'+
                                '<button onclick="Display_None()">Annuler</button>';
        div_text.innerHTML = '<div>Êtes-vous sûr de vouloir bannir l\'utilisateur ?</div>' + confirm_function;
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
                    window.location.href = "Dashboard.php";
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


function Remove_Report(reportId){
    
    return;
}