/**
 *  @title : notification.js
 * 
 *  @author : Guillaume RISCH
 *  @author : Matthis HOULES
 * 
 *  @brief : modals notification js 
 * 
 */



// get DOM notifications 
let notifications = document.querySelectorAll('.notification');

for (var i = 0; i < notifications.length; ++i) {
    setTimeout(deleteNotification, 10000, notifications[i]);
}



/**
 * @name : deletePopUp
 * 
 * @param {Dom OBJECT} notification
 * 
 * @return void
 * 
 * @brief : remove the Popup from the DOM 
 */
function deleteNotification(notification) {
    notification.remove();
} // function deletePopUp(popup) 