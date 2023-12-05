import {DataService} from "../DataService.js";

class InputImageObj {
    #formImage = null
    #image = null
     constructor(index) {
        let input = document.getElementById("formImage" + index)
        let image = document.getElementById("imageShow" + index)

        input.addEventListener('change',()=> {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload =  (e) => {
                    image.src = e.target.result;

                    this.sendImage(input.files[0]).then();
                };
                reader.readAsDataURL(input.files[0]);
            }
        });




        this.#formImage = input
        this.#image = image
    }
    async sendImage(image) {
        const formData = new FormData();
        formData.append('file', image);
        formData.append('id',characterId);

          await DataService.sendDataRequest(
              'saveCharacterImage',
              "POST",
              204,
              formData,
              false,
              'characters'
          )
    }

}


export {InputImageObj};