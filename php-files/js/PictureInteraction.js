/**
 * Comment and like pictures
 * SHOWPICTURES.PHP
 * COMMENTPICTURE.PHP
 */
export default class PictureInteraction{
    constructor(){
        this.buttonsLike = document.querySelectorAll(".picture-like-button");
        this.buttonComment = document.getElementById("picture-sendComment-button");
        this.textComment = document.getElementById("picture-textComment-input");
        this.comments = document.getElementById("picture-comments");
    }
    run(){
        this.like();
        this.comment();
    }

    like(){
        if (this.buttonsLike == null) return;
        this.buttonsLike.forEach((button)=>{
            button.addEventListener("click", (event)=>{
                event.preventDefault();
                const pictureId = button.getAttribute("data-picture-id");
                this.sendLike(pictureId);
            });
        });
    }
    comment(){
        console.log(this.buttonComment);
        if (this.buttonComment == null) return;
        this.buttonComment.addEventListener("click", (event)=>{
            event.preventDefault();
            const pictureId = this.buttonComment.getAttribute("data-picture-id");
            if (this.textComment == null) return;
            if (this.textComment != null){
                this.sendComment(pictureId, this.textComment.value);
                this.textComment.value = "";
            }
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

    sendComment(id, comment){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "router.php?page=pictureSendComment", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = () => {
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                this.getComment(id);
            }
        };
        xhr.send("id=" + id + "&comment=" + comment);
    }

    getComment(id){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "router.php?page=pictureGetComments", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            xhr.getResponseHeader('Content-Type', 'application/json');
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                $data = JSON.parse(xhr.responseText);
                if (this.comments == null) return;
                this.comments.innerHtml = "";
                let commentList = [];
                for (const [key, value] of Object.entries(object1)) {
                    commentList += "<li>" + value + "</li>";
                }
                Object.values(data).forEach(({ id, name }) => {
                    console.log(id, name)
                });
            }
        };
        xhr.send("id=" + id);
    }
}