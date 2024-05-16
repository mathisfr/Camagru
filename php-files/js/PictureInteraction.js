/**
 * Comment and like pictures
 */
export default class PictureInteraction{
    constructor(){
        this.buttonsLike = document.querySelectorAll(".picture-like-button");
        this.buttonsComment = document.querySelectorAll(".picture-comment-button");
    }
    like(){
        if (this.buttonsLike == null) return;
        this.buttonsLike.forEach((button)=>{
            button.addEventListener("click", ()=>{
                const pictureId = button.getAttribute("data-picture-id");
                this.sendLike(pictureId);
            });
        });
    }
    openModal(){
        if (this.buttonsComment == null) return;
        this.buttonsComment.forEach((button)=>{
            button.addEventListener("click", ()=>{
                const pictureId = button.getAttribute("data-picture-id");
                
            });
        });
    }

    sendLike(id){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "router.php?page=pictureLike", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send("id=" + id);
    }
}