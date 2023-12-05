import {DataService} from "../DataService.js";

class GalleryEditor {
    static #countCollums = 3;
    static #buttonHTML = "<a class=\"link-light link-opacity-75-hover\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">\n" +
        "                <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z\"/>\n" +
        "                <path d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z\"/>\n" +
        "            </svg></a>"

    constructor() {
        this.createAddeters()
        this.createDeleters()
    }

    createDeleters() {
        for (let i = 1; i <= GalleryEditor.#countCollums; i++) {
            let galleryElement = document.getElementById("gallery" + i);
            for(let i = 0; i < galleryElement.children.length - 1; i += 2) {
                let image = galleryElement.children.item(i + 1)
                let button = galleryElement.children.item(i)
                galleryElement.children.item(i).addEventListener("click", () => {
                    galleryElement.removeChild(image)
                    galleryElement.removeChild(button)
                    this.deleteImage(image, image.getAttribute("data-picture-id")).then(); //?????

                })
            }
        }
    }

    createAddeters() {
        for (let i = 1; i <= GalleryEditor.#countCollums; i++) {
            let inputElement = document.getElementById("galleryAddButton" + i);
            let galleryElement = document.getElementById("gallery" + i);
            galleryElement.addEventListener("change", async() => {
                if (inputElement.files.length > 0) {
                    let file = inputElement.files[0];

                    if (file.type.startsWith('image/')) {
                        let newImage = document.createElement('img');
                        newImage.className = 'w-100 shadow-1-strong rounded mb-4';
                        newImage.alt = file.name;

                        let buttonDelete = document.createElement("a");
                        buttonDelete.innerHTML = GalleryEditor.#buttonHTML;

                        await this.sendImage(file, i).then(async () => {

                        let reader = new FileReader();
                        reader.onload =  (e) => {
                            newImage.src = e.target.result;
                            galleryElement.insertBefore(buttonDelete, galleryElement.children.item(galleryElement.children.length - 1))
                            galleryElement.insertBefore(newImage, galleryElement.children.item(galleryElement.children.length - 1));

                        };

                        let id = await this.getNewPictureId(i).then();

                            buttonDelete.addEventListener("click",  () => {
                            galleryElement.removeChild(newImage)
                            galleryElement.removeChild(buttonDelete)
                            console.log(id)
                             this.deleteImage(file, id).then();
                        })

                        reader.readAsDataURL(file);
                        inputElement.value = '';
                        });
                    }

                }
            })
        }
    }
    async sendImage(image, column) {
        const formData = new FormData();
        formData.append('file', image);
        formData.append('id_character', characterId);
        formData.append('id_column', column);

        await DataService.sendDataRequest(
            'addPictureToGallery',
            "POST",
            204,
            formData,
            false,
            'characters'
        )
    }

    async getNewPictureId(id_column) {
        let picture = await DataService.sendRequest(
            'getLastPictureGalleryId',
            "POST",
            200,
            {
                id_column: id_column,
                id_character: characterId
            },
            false,
            'characters'
        )
        console.log(picture)
        return picture.id;
    }


    async deleteImage(image, imageId) {
        const formData = new FormData();
        formData.append('file', image);
        formData.append('id_image', imageId);

        await DataService.sendDataRequest(
            'deletePictureGallery',
            "POST",
            204,
            formData,
            false,
            'characters'
        )
    }
}

export {GalleryEditor};