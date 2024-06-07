function Disconnect() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Authentification/Disconnect.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // La déconnexion a réussi
            window.location.href = "../Index.php";
        }
    };
    xhr.send();
}