function Disconnect() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Authentification/Disconnect/Disconnect.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // La déconnexion a réussi, vous pouvez rediriger l'utilisateur ou effectuer d'autres actions nécessaires
            window.location.href = "../WelcomePage/Index.php";
        }
    };
    xhr.send();
}