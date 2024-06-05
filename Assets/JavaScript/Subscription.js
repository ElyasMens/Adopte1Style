document.addEventListener('DOMContentLoaded', function() {
    const detailsToggle = document.querySelector('.details-toggle');
    const detailsContent = document.querySelector('.details-content');

    detailsToggle.addEventListener('click', function() {
        if (detailsContent.style.display === 'none' || detailsContent.style.display === '') {
            detailsContent.style.display = 'block';
        } else {
            detailsContent.style.display = 'none';
        }
    });
});

function subscribeUser() {
    $.ajax({
        type: "POST",
        url: "Subscription.php",
        data: {
            action: 'Update_Module'
        }, 
        success: function(response) {
            if (response.success) {
                window.location.href = "../Home/Accueil.php";
        }},
        error: function(xhr, status, error) {
            console.error("Erreur lors de la mise à jour : " + error);
            console.log("Status: " + status);
            console.log("Response: " + xhr.responseText);
        }
    });
}