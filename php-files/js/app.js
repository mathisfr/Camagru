import Home from './Home.js';
import Header from './Header.js';
import Makepicture from './Makepicture.js';
import Notification from './Notification.js';
import PictureInteraction from './PictureInteraction.js';

/**
 * APP
 */
if (document.readyState === "loading") {
    appLoading();
} else {
    document.addEventListener("DOMContentLoaded", DOMLoaded);
}

function appLoading() {
    console.log("DOM is loading...");
}

function DOMLoaded() {
    let home = new Home();
    home.switchButton();
    
    let header = new Header();
    header.hamburgerMenu();

    let makepicture = new Makepicture();
    makepicture.takePicture();

    let notification = new Notification();
    notification.closeNotification();

    let pictureInteraction = new PictureInteraction();
    pictureInteraction.run();
}