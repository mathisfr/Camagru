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
                console.log("click");
                const widthClient = this.video.clientWidth;
                const heightClient = this.video.clientHeight;
                const width = this.video.videoWidth;
                const height = this.video.videoHeight;
                const aspectRatio = 9/16;
                console.log(`${width}, ${height}`);
                extCanvas.width = widthClient;
                extCanvas.height = heightClient;
                context.drawImage(this.video, widthClient * aspectRatio, 0, widthClient * aspectRatio, height, 0, 0, widthClient, heightClient);
                const data = extCanvas.toDataURL('image/png');
                window.open(data, '_blank');
            });
        }
    }
}