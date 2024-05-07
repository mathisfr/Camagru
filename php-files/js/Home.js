/**
 * HOME.PHP
 */
export default class Home{
    constructor(){
        this.buttonLogin = document.getElementById("home-button-login");
        this.buttonRegister = document.getElementById("home-button-register");
        this.divLogin = document.getElementById("home-login");
        this.divRegister = document.getElementById("home-register");
    }
    switchButton(){
        if (this.buttonLogin != null){
            this.buttonLogin.addEventListener("click", ()=>{
                this.divLogin.style.display = "block";
                this.divRegister.style.display = "none";
            });
        }  
        if (this.buttonRegister != null){
            this.buttonRegister.addEventListener("click", ()=>{
                this.divLogin.style.display = "none";
                this.divRegister.style.display = "block";
            });
        }
    }
}