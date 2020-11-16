/**
 * @title : main.js
 * @for : Alain COLMERAUER tribute website
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 */


// mobile responsive menu
if (screen.width < 1031) {
    var navbarTrigger = document.getElementById('mobileMenuTrigger');
    navbarTrigger.addEventListener('click', function() {

        document.getElementById('navbar').classList.toggle('display');

    });
}


