/**
 * MAKEPICTURE.PHP
 */
export default class Makepicture{
    constructor(){
        this.buttonTakePicture = document.getElementById('makepicture-button');
        this.video = document.getElementById('makepicture-video');
        this.cameraSection = document.getElementById('makepicture-camera');

        this.decoPreview = document.getElementById('makepicture-preview-img');
        this.nextPreview = document.getElementById('makepicture-next-preview');
        this.prevPreview = document.getElementById('makepicture-previous-preview');
        this.nbrDecoPreview = 6;
        this.currentDecoId = 1;

        this.pictureImport = document.getElementById('picture-import');
        this.pictureImagePreview = document.getElementById('picture-image-preview');
        this.pictureUpload = document.getElementById('picture-upload');
    }

    run(){
        this.takePicture();
        this.preview();
        this.importPicture();
        this.uploadPicture();
    }

    preview(){
        if (this.decoPreview == null || this.nextPreview == null || this.prevPreview == null) return;
        this.nextPreview.addEventListener('click', ()=>{
            this.currentDecoId = this.decoPreview.getAttribute('data-deco-id');
            this.setPreviewDeco(true);
        });
        this.prevPreview.addEventListener('click', ()=>{
            this.currentDecoId = this.decoPreview.getAttribute('data-deco-id');
            this.setPreviewDeco(false);
        });
    }

    setPreviewDeco(next){
        if (next === true){
            this.currentDecoId++;
            if (this.currentDecoId > this.nbrDecoPreview){
                this.currentDecoId = 1;
            }
        }else{
            this.currentDecoId--;
            if (this.currentDecoId < 1){
                this.currentDecoId = this.nbrDecoPreview;
            }
        }
        this.decoPreview.setAttribute('data-deco-id', this.currentDecoId);
        this.decoPreview.src = './uploads/decos/deco' + this.currentDecoId + '.png';
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
        xhr.open('POST', 'http://localhost:8080/router.php?page=pictureUploadAjax', true);
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
        xhr.send('image=' + dataImage + '&deco=' + this.currentDecoId);
    };

    importPicture(){
        if (this.pictureImport == null || this.pictureImagePreview == null) return;
        this.pictureImport.addEventListener('change', ()=>{
            console.log('change');
            const file = this.pictureImport.files[0];
            this.pictureImagePreview.src = URL.createObjectURL(file);
            this.pictureImagePreview.addEventListener('load', ()=>{
                URL.revokeObjectURL(this.src);
            });
        }, false);
    }

    uploadPicture(){
        if(this.pictureImagePreview == null || this.pictureUpload == null || this.currentDecoId == null) return;
        this.pictureUpload.addEventListener('click', ()=>{
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            canvas.height = this.pictureImagePreview.clientHeight;
            canvas.width = this.pictureImagePreview.clientWidth;
            var aspectRatio = canvas.width  / canvas.height ;
            context.drawImage(this.pictureImagePreview, (this.pictureImagePreview.naturalWidth / 2) * aspectRatio, 0, this.pictureImagePreview.naturalWidth * aspectRatio, this.pictureImagePreview.naturalHeight, 0, 0, canvas.width, canvas.height);
            var dataURL = canvas.toDataURL('image/jpeg');
            this.sendImage(dataURL);
        });
    }
}