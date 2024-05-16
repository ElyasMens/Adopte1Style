function display(){
        //Récupération des éléments du form
        var button = document.getElementById("InscriptionConnexion");
        var title = document.querySelector(".TitleForm");
        var form = document.querySelector("#Connexion");
        var postButton = document.getElementById("postButton");
        //Modification des éléments du form en fonction du Button du header
        if (button.innerText === "SE CONNECTER"){
            button.innerText = "S'INSCRIRE";
            title.textContent = "CONNEXION";
            form.action = "../Authentification/Login/LoginForm.php";
            postButton.value = "Connexion";
        }else{
            button.innerText = "SE CONNECTER";
            title.textContent = "INSCRIPTION";
            form.action = "../Authentification/SignUp/SignUpForm.php";
            postButton.value = "S'inscrire";
        
        }
}

function Reveal(isError) {
    var ConnexionForm = document.querySelector("#c2-l1");
    if (ConnexionForm) {
        //Affichage du form
        if (ConnexionForm.classList.contains("Hidden")){
            ConnexionForm.classList.remove("Hidden");
            ConnexionForm.classList.add("Content");
            if(isError){
                var title = document.querySelector(".TitleForm");
                title.style.marginBottom = "20px";
            }
        }
        display();
        //Retire le message d'erreur
        var error_message = document.querySelector("#ErrorMessage");
        if(error_message){
                error_message.classList.add("Hidden");
        }
    }
}



function Error(){
    var error_message = document.querySelector("#ErrorMessage");
    if(error_message){
        error_message.classList.remove("Hidden");
        if(error_message.innerHTML === 'PSEUDO EST DÉJA UTILISÉ.'){
            display();
            Console.log('display réussi');
        }
    }
}