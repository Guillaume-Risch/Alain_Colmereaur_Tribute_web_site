/**
 * @title : programme.js
 * @for : Alain COLMERAUER
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 */

var modalspopup = document.querySelectorAll('button.title');
var modalOverlay = document.getElementById('modalOverlay');


modalspopup.forEach(element => {
    element.addEventListener('click', displayPopup);
});

modalOverlay.addEventListener('click', blurPopup);

/**
 * 
 * @name : displayPopup
 * @param : void
 * @return : void
 * 
 */
function displayPopup() {

    document.getElementById('modalOverlay').classList.add('display');
    document.getElementById('popupContainer').classList.add('display');

} // function displayPopup

/**
 * 
 * @name : blurPopup
 * @param : void
 * @return : void
 * 
 */
function blurPopup() {

    document.getElementById('modalOverlay').classList.remove('display');
    document.getElementById('popupContainer').classList.remove('display');

} // function blurPopup