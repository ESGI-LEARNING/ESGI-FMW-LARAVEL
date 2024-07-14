import TomSelect from 'tom-select'
import 'tom-select/dist/css/tom-select.default.css';

const selects = document.querySelectorAll('#tom-select')

if (selects) {
    selects.forEach(s => {
        new TomSelect(s, {
            plugins: {
                remove_button: {
                    title: 'Remove this item',
                },
            },
        })
    })
}

