window.onscroll = function() {
    var navbar = document.querySelector('.fixed-top');
    if (window.pageYOffset > 50) { // Ajustez la valeur selon vos besoins
        navbar.classList.add('navbar-scrolled'); // Ajouter la classe pour changer la couleur
    } else {
        navbar.classList.remove('navbar-scrolled'); // Retirer la classe
    }
};

