/**
 * NOTIFICATION.PHP
 */
export default class Notification{
    constructor(){
        this.notification = document.getElementById("notification-session");
        this.close = document.getElementById("notification-session-close");
    }
    closeNotification(){
        if (this.notification != null){
            this.close.addEventListener("click", ()=>{
                this.notification.remove();
            });
        }
    }
}