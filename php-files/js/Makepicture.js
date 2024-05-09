/**
 * MAKEPICTURE.PHP
 */
export default class Makepicture{
    constructor(){
        this.buttonTakePicture = document.getElementById('makepicture-button');
        this.video = document.getElementById('makepicture-video');
    }
    takePicture(){
        if (this.video !== null){
            navigator.mediaDevices.getUserMedia({video:true, audio:false})
            .then((stream) => {
                this.video.srcObject = stream;
                this.video.play();
            })
            .catch((err) => {
                console.error(`An error occurred: ${err}`);
            });
        }
        if (this.buttonTakePicture != null || this.buttonTakePicture != undefined){
            this.buttonTakePicture.addEventListener("click", ()=>{
                const extCanvas = document.createElement("canvas");
                const context = extCanvas.getContext('2d');
                const widthClient = this.video.clientWidth;
                const heightClient = this.video.clientHeight;
                const height = this.video.videoHeight;
                const aspectRatio = 9/16;
                extCanvas.width = widthClient;
                extCanvas.height = heightClient;
                context.drawImage(this.video, widthClient * aspectRatio, 0, widthClient * aspectRatio, height, 0, 0, widthClient, heightClient);
                const data = extCanvas.toDataURL('image/png');
                this.sendImage(data);
                //window.open(data, '_blank');
            });
        }
    }
    sendImage(dataImage){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost:8080/router.php?page=pictureUpload', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send('image=' + dataImage);
    }
}