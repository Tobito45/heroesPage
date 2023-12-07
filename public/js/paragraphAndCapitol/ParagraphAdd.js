class ParagraphAdd {

     static #htmlNewParagraphEven =
        '<div>\n' +
        '        <div id="">\n' +
        '            <p id="">\n' +
        '                <a id="" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">\n' +
        '                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>\n' +
        '                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>\n' +
        '                    </svg></a>\n' +
        '            </p>\n' +
        '        </div>\n' +
        '        <div class="imageCapitol">\n' +
        '            <img id="" class="rounded-2">\n' +
        '            <form>\n' +
        '                <input id=""  type="file"  accept="image/*">\n' +
        '            </form>\n' +
        '        </div>\n' +
        '    </div>'

    static  #htmlNewParagraphOdd =
        '<div>\n' +
        '        <div class="imageCapitol">\n' +
        '            <img id="" class="rounded-2" >\n' +
        '            <form>\n' +
        '                <input id=""  type="file"  accept="image/*">\n' +
        '            </form>\n' +
        '        </div>\n' +
        '        <div id="">\n' +
        '            <p id="">\n' +
        '                <a id="" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">\n' +
        '                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>\n' +
        '                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>\n' +
        '                    </svg></a>\n' +
        '            </p>\n' +
        '        </div>\n' +
        '    </div>'

    #parent = null
    #button = null
    #capitol = null
    constructor(mainDiv, index) {
        this.#capitol = document.getElementById("Capitol" + index);
        this.#parent = mainDiv;
        this.#button = mainDiv.querySelector('button');
        this.#button.addEventListener("click", () => {
            let newElemnet = document.createElement("div");
            if (this.#capitol.children.length % 2 === 0) {
                newElemnet.innerHTML = ParagraphAdd.#htmlNewParagraphEven;
            } else {
                newElemnet.innerHTML = ParagraphAdd.#htmlNewParagraphOdd;
            }

            this.#capitol.insertBefore(newElemnet, this.#capitol.children.item(this.#capitol.children.length - 1));
        })
    }
}
export {ParagraphAdd};