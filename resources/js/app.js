import './bootstrap';
import './libs/tom-select.js'
import './libs/quilljs.js'

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import focus from '@alpinejs/focus'

Alpine.plugin(focus)
Livewire.start();
