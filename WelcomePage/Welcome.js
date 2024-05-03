function Reveal() {
    var ConnexionForm = document.querySelector("#ConnexionDiv");
    if (ConnexionForm) {
        ConnexionForm.classList.remove("Hidden");

        var button = document.getElementById("InscriptionConnexion");
        var title = document.querySelector(".TitleForm");
        var form = document.querySelector("#Connexion");
        var postButton = document.getElementById("postButton");
        if (button.innerText === "CONNEXION"){
            button.innerText = "INSCRIPTION";
            title.textContent = "CONNEXION";
            form.action = "/ConnexionPage/Connexion.php";
            postButton.value = "Connexion";
        }else{
            button.innerText = "CONNEXION";
            title.textContent = "INSCRIPTION";
            form.action = "/SignUpPage/SignUp.php.php";
            form.method = "post";
            postButton.value = "S'inscrire";
        }   
    
    }
}
