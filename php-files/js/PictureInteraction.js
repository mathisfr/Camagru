/**
 * Comment and like pictures
 * SHOWPICTURES.PHP
 * COMMENTPICTURE.PHP
 */
export default class PictureInteraction{
    constructor(){
        this.buttonsUnLike = document.querySelectorAll(".picture-unlike-button");
        this.buttonsLike = document.querySelectorAll(".picture-like-button");
        this.buttonComment = document.getElementById("picture-sendComment-button");
        this.textComment = document.getElementById("picture-textComment-input");
        this.comments = document.getElementById("picture-comments");
    }
    run(){
        this.like();
        this.unlike();
        this.comment();
        this.getCommentAutomatic();
    }

    like(){
        if (this.buttonsLike == null) return;
        this.buttonsLike.forEach((button)=>{
            button.addEventListener("click", (event)=>{
                event.preventDefault();
                const pictureId = button.getAttribute("data-picture-id");
                this.setLike(pictureId, button);
            });
        });
    }

    unlike(){
        if (this.buttonsUnLike == null) return;
        this.buttonsUnLike.forEach((button)=>{
            button.addEventListener("click", (event)=>{
                event.preventDefault();
                const pictureId = button.getAttribute("data-picture-id");
                this.setLike(pictureId, button);
            });
        });
    }

    comment(){
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

    getCommentAutomatic(){
        if (this.buttonComment == null) return;
        const pictureId = this.buttonComment.getAttribute("data-picture-id");
        this.getComment(pictureId);
    }

    setLike(id, button){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "router.php?page=pictureLikeAjax", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = () => {
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                if (button.classList.contains("picture-like-button")){
                    button.classList.remove("picture-like-button");
                    button.classList.add("picture-unlike-button");
                }else {
                    button.classList.remove("picture-unlike-button");
                    button.classList.add("picture-like-button");
                }
                button.textContent = "Like " + xhr.responseText;
            }
        };
        xhr.send("id=" + id);
    }

    sendComment(id, comment){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "router.php?page=pictureSendCommentAjax", true);
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
        xhr.open("POST", "router.php?page=pictureGetCommentsAjax", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = () => {
            xhr.getResponseHeader('Content-Type', 'application/json');
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                if (this.comments == null) return;
                this.comments.innerHtml = "";
                let commentList = [];
                for (var i = data.length; i > 0; i--) {
                    if (data[i] == null) continue;
                    let user_name = data[i].username;
                    let comment = data[i].comment;
                    commentList += '<li><p class="commentpicture-username">' + user_name + '</p><p>' + comment + '</p></li>';
                }
                this.comments.innerHTML = commentList;
            }
        };
        xhr.send("id=" + id);
    }
}