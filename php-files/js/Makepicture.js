/**
 * MAKEPICTURE.PHP
 */
export default class Makepicture{
    constructor(){
        this.buttonTakePicture = document.getElementById('makepicture-button');
        this.video = document.getElementById('makepicture-video');
    }
    takePicture(){
        if (this.video == null) return;
        navigator.mediaDevices.getUserMedia({video:true, audio:false})
        .then((stream) => {
            this.video.srcObject = stream;
            this.video.play();
        })
        .catch((err) => {
            console.error(`An error occurred: ${err}`);
        });
        if (this.buttonTakePicture != null || this.buttonTakePicture != undefined){
            this.buttonTakePicture.addEventListener("click", ()=>{
                const extCanvas = document.createElement("canvas");
                const context = extCanvas.getContext('2d');
                const widthClient = this.video.clientWidth;
                const heightClient = this.video.clientHeight;
                const width = this.video.videoWidth;
                const height = this.video.videoHeight;
                extCanvas.width = widthClient;
                extCanvas.height = heightClient;
                const offsetWidth = width/2 - widthClient/2;
                context.drawImage(this.video, offsetWidth, 0, (width/2), height, 0, 0, widthClient, heightClient);
                const data = extCanvas.toDataURL('image/jpeg');
                this.sendImage(data);
            });
        }
    };
    sendImage(dataImage){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost:8080/router.php?page=pictureUpload', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = ()=> {
            if (xhr.readyState != 4 ) return;
            if (xhr.status == 200) {
                this.video.pause();
                alert(xhr.responseText);
                this.video.play();
            }else{
                alert('Error');
            }
        };
        xhr.send('image=' + dataImage);
    };
}