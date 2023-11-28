class InputImageObj {
    #formImage = null
    #image = null
    constructor(index) {
        let input = document.getElementById("formImage" + index)
        let image = document.getElementById("imageShow" + index)

        input.addEventListener('change', function () {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        });

        this.#formImage = input
        this.#image = image
    }

}


export {InputImageObj};