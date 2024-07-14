import Quill from "quill";

let selector = 'editor-quilljs'
let input = document.getElementById(selector)

if (input) {
    new Quill(selector, {
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'],
            ],
        },
        placeholder: 'Plongez-vous dans votre article...',
        theme: 'snow', // or 'bubble'
    });
}
