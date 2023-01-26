/*import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();*/

import './bootstrap';


// window.Alpine = Alpine;


// Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler';

import Message from './components/Message.vue'

const app = createApp({});

app.component('message', Message).mount('#app');