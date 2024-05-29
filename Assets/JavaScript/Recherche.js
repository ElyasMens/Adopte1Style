function Load_Info() {
    var users = document.querySelectorAll('.user-info');

    // Parcourir tous les utilisateurs
    users.forEach(function(user) {
        var userName = user.dataset.username;
        var userLocation = user.dataset.location;
        var userGender = user.dataset.gender;
        var userJob = user.dataset.job; 
        var userSize = user.dataset.size;    

        var userAge = calculateAge(user.dataset.birthdate);
        console.log(userAge);

        var userInfoContent = user.querySelector('.user-info-content');
        userInfoContent.innerHTML = `${userName} ${userAge} ans, ${userGender}<br>De ${userLocation}<br>Emploi: ${userJob}<br>Taille: ${userSize}cm`;
    });
}
document.addEventListener('DOMContentLoaded', Load_Info);

function filterUsers() {
    var ageMin = document.getElementById('age_min').value;
    var ageMax = document.getElementById('age_max').value;
    var localisation = document.getElementById('localisation').value;
    var gender = document.getElementById('gender').value;
    var profession = document.getElementById('profession').value;
    var tailleMin = document.getElementById('taille_min').value;
    var tailleMax = document.getElementById('taille_max').value;

    // Sélectionner tous les utilisateurs
    var users = document.querySelectorAll('.user-info');

    // Parcourir tous les utilisateurs
    users.forEach(function(user) {
        var userLocation = user.dataset.location;
        var userGender = user.dataset.gender;
        var userJob = user.dataset.job;
        var userSize = user.dataset.size;
        var userAge = calculateAge(user.dataset.birthdate);
        // Flitrage
        if ((ageMin === '' || userAge >= ageMin) &&
            (ageMax === '' || userAge <= ageMax) &&
            (localisation === '' || userLocation.toLowerCase().includes(localisation.toLowerCase())) &&
            (gender === '' || userGender === gender) &&
            (profession === '' || userJob.toLowerCase().includes(profession.toLowerCase())) &&
            (tailleMin === '' || userSize >= tailleMin) &&
            (tailleMax === '' || userSize <= tailleMax)) {
            // Retire la classe 'hide-user' 
            user.classList.remove('hide-user');
            user.classList.add('show-user');
        } else {
            // Ajoute la classe 'hide-user'
            user.classList.add('hide-user');
            user.classList.remove('show-user');
        }
    });
}

function Set_a_Cookie(redirection, user_selected) {
    if (redirection === 'messages') {
        document.cookie = 'contact_username=' + user_selected + '; path=/';
    } else if (redirection === 'profile') {
        document.cookie = 'user_selected=' + user_selected + '; path=/';
    }
}



function searchUsers() {
    var searchName = document.getElementById('search').value;
    
    // Sélectionner tous les utilisateurs
    var users = document.querySelectorAll('.user-info');
   
    // Parcourir tous les utilisateurs
    users.forEach(function(user) {
        var userName = user.dataset.username;
        // Flitrage
        if (searchName == userName) {
            // Retire la classe 'hide-user' 
            user.classList.remove('hide-user');
            user.classList.add('show-user');
        } else {
            // Ajoute la classe 'hide-user'
            user.classList.add('hide-user');
            user.classList.remove('show-user');
        }
    });
}





