/**
 * GLOBAL
 */
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", DOMLoaded);
} else {
  doSomething();
}

function DOMLoaded() {
    home();
    header();
    makePicture();
}

/**
 * HOME.PHP
 */
function home(){
    switchButton();
}

var buttonLogin;
var buttonRegister ;
var divLogin;
var divRegister;
function switchButton(){
    if (buttonLogin === undefined){
        buttonLogin = document.getElementById("home-button-login");
    }
    if (buttonRegister === undefined){
        buttonRegister = document.getElementById("home-button-register");
    }
    if (divLogin === undefined){
        divLogin = document.getElementById("home-login");
    }
    if (divRegister === undefined){
        divRegister = document.getElementById("home-register");
    }
    if (buttonLogin !== null) {
        buttonLogin.addEventListener("click", function(){
            divLogin.style.display = "block";
            divRegister.style.display = "none";
        });
        buttonRegister.addEventListener("click", function(){
            divLogin.style.display = "none";
            divRegister.style.display = "block";
        });
    }
}

/**
 * HEADER.PHP
 */
function header(){
    hamburgerMenu();
}
function hamburgerMenu(){
    const hamburger = document.getElementById("nav-hamburger");
    if (hamburger !== null){
        var menu = document.getElementById("nav-menu");
        hamburger.addEventListener("click", function(){
            if(menu.style.display === "block"){
                menu.style.display = "none";
            }else{
                menu.style.display = "block";
            }
        });
    }
}

/**
 * MAKEPICTURE.PHP
 */
const output_height = 600;
const output_width = 400;
let buttonTakePicture
function makePicture(){
    takePicture();
}

function takePicture(){
    const video = document.getElementById('makepicture-video');
    const buttonTakePicture = document.getElementById('makepicture-button');
    if (video !== null){
        navigator.mediaDevices.getUserMedia({video:true, audio:false})
        .then((stream) => {
            video.srcObject = stream;
            video.play();
        })
        .catch((err) => {
            console.error(`An error occurred: ${err}`);
        });
    }
    if (buttonTakePicture != null || buttonTakePicture != undefined){
        buttonTakePicture.addEventListener("click", function(){
            const extCanvas = document.createElement("canvas");
            const context = extCanvas.getContext('2d');
            console.log("click");
            const widthClient = video.clientWidth;
            const heightClient = video.clientHeight;
            const width = video.videoWidth;
            const height = video.videoHeight;
            const aspectRatio = 9/16;
            console.log(`${width}, ${height}`);
            extCanvas.width = widthClient;
            extCanvas.height = heightClient;
            context.drawImage(video, widthClient * aspectRatio, 0, widthClient * aspectRatio, height, 0, 0, widthClient, heightClient);
            const data = extCanvas.toDataURL('image/png');
            window.open(data, '_blank');
        });
    }
}