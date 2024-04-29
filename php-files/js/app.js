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
}

/**
 * HOME.PHP
 */
function home(){
    switchButton();
}

function switchButton(){
    var buttonLogin = document.getElementById("home-button-login");
    var buttonRegister = document.getElementById("home-button-register");
    var divLogin = document.getElementById("home-login");
    var divRegister = document.getElementById("home-register");

    buttonLogin.addEventListener("click", function(){
        divLogin.style.display = "block";
        divRegister.style.display = "none";
    });
    buttonRegister.addEventListener("click", function(){
        divLogin.style.display = "none";
        divRegister.style.display = "block";
    });
}

/**
 * HEADER.PHP
 */
function header(){
    hamburgerMenu();
}

function hamburgerMenu(){
    
    var hamburger = document.getElementById("nav-hamburger");
    var menu = document.getElementById("nav-menu");

    hamburger.addEventListener("click", function(){
        if(menu.style.display === "none"){
            menu.style.display = "block";
        }else{
            menu.style.display = "none";
        }
    });
}