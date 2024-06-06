function convertDate(dateString) {
    var parts = dateString.split("-");
    return new Date(parts[0], parts[1] - 1, parts[2]);
}

function calculateAge(birthday) {
    var today = new Date();
    var birthDate = convertDate(birthday);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function validateForm(event) {
    var dateNaissance = document.getElementById('date_naissance').value;
    var age = calculateAge(dateNaissance);
    if (age < 18) {
        alert("Vous devez avoir au moins 18 ans pour créer un profil.");
        event.preventDefault(); // Empêche la soumission du formulaire
        return false;
    }

    var profession = document.getElementById('profession').value;
    var letters = /^[A-Za-z]+$/;

    if (!profession.match(letters)) {
        alert("Votre profession ne peut comporter que des lettres.");
        event.preventDefault();
        return false;
    }

    return true; // Soumission du formulaire si tout est valide
}