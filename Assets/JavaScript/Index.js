function display(){

        var button = document.getElementById("InscriptionConnexion");
        var ConnexionForm = document.getElementById("Connexion");
        var InscriptionForm = document.getElementById("Inscription");

        if (button.innerText === "SE CONNECTER"){
            button.innerText = "S'INSCRIRE";
            ConnexionForm.classList.remove("hidden-form");
            ConnexionForm.classList.add("Content");
            InscriptionForm.classList.remove("Content");
            InscriptionForm.classList.add("hidden-form");
        }else{
            button.innerText = "SE CONNECTER";
            InscriptionForm.classList.remove("hidden-form");
            InscriptionForm.classList.add("Content");
            ConnexionForm.classList.remove("Content");
            ConnexionForm.classList.add("hidden-form");
        }
}

function RevealSignUp(){
    var ConnexionForm = document.getElementById("Connexion");
    var InscriptionForm = document.getElementById("Inscription");
    var button = document.getElementById("InscriptionConnexion");
    if (InscriptionForm) {
        //Affichage du form
        if (InscriptionForm.classList.contains("hidden-form")){
            InscriptionForm.classList.remove("hidden-form");
            InscriptionForm.classList.add("Content");
        }
        if (ConnexionForm.classList.contains("Content")){
            ConnexionForm.classList.add("hidden-form");
            ConnexionForm.classList.remove("Content");
        }
    }
    if(button.innerText === "S'INSCRIRE"){
        button.innerText = "SE CONNECTER";
    }
}

function Reveal(isError,SignOrLog) {
    var ConnexionForm = document.getElementById("Connexion");
    if (ConnexionForm) {
        display();
        if(isError){
                console.log("Hey");
                if(SignOrLog === 'Log'){
                    console.log("Login");
                    ConnexionForm.classList.add("Content");
                    ConnexionForm.classList.remove("hidden-form");
                }
            }
        var error_message = document.querySelector("#ErrorMessage");
        if(error_message){
            error_message.classList.add("hidden-form");
                
        }
    }
}

