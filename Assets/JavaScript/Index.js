function Reveal() {
    var ConnexionForm = document.querySelector("#ConnexionDiv");
    if (ConnexionForm) {
        //Affichage du form
        if (ConnexionForm.classList.contains("Hidden")){
            ConnexionForm.classList.remove("Hidden");
        }

        
        //Récupération des éléments du form
        var button = document.getElementById("InscriptionConnexion");
        var title = document.querySelector(".TitleForm");
        var form = document.querySelector("#Connexion");
        var postButton = document.getElementById("postButton");
        
        //Modification des éléments du form en fonction du Button du header
        if (button.innerText === "CONNEXION"){
            button.innerText = "INSCRIPTION";
            title.textContent = "CONNEXION";
            form.action = "../SignUpLoginFolder/Login/LoginForm.php";
            postButton.value = "Connexion";
        }else{
            button.innerText = "CONNEXION";
            title.textContent = "INSCRIPTION";
            form.action = "../SignUpLoginFolder/SignUp/SignUpForm.php";
            form.method = "post";
            postButton.value = "S'inscrire";
        }   
    
    }
}