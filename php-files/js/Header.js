/**
 * HEADER.PHP
 */
export default class Header{
    constructor(){
        this.hamburger = document.getElementById("nav-hamburger");
        this.menu = document.getElementById("nav-menu");
    }
    hamburgerMenu(){
        if (this.hamburger != null){
            this.hamburger.addEventListener("click", ()=>{
                if(this.menu.style.display === "block"){
                    this.menu.style.display = "none";
                }else{
                    this.menu.style.display = "block";
                }
            });
        }
    }
}