import Quill from "quill";

let selector = 'editor-quilljs'
let input = document.getElementById(selector)

if (input) {
    const quill = new Quill("#editor-quilljs", {
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

    let quillEditor = document.getElementById('quill-editor-area');

    quill.on('text-change', function(e) {
        quillEditor.value = quill.root.innerHTML;
    });

    quillEditor.addEventListener('input', function() {
        quill.root.innerHTML = quillEditor.value;
    });
}
