/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

// Import Bootstrap and BootstrapVue CSS files (order is important)



/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);
import Login from './components/Login.vue';
app.component('login-component', Login);
import Painel from './components/Painel.vue';
app.component('painel-component', Painel);
import Menu from './components/comuns/Menu.vue';
app.component('menu-component', Menu);
import Home from './components/layouts/Home.vue';
app.component('home-component', Home);
import Produtos from './components/layouts/Produtos.vue';
app.component('produtos-component', Produtos);
import Blog from './components/layouts/Blog.vue';
app.component('posts-component', Blog);
import Eventos from './components/layouts/Eventos.vue';
app.component('eventos-component', Eventos);
import Modal from './components/comuns/Modal.vue';
app.component('modal-component', Modal);
import AlertMsg from './components/comuns/AlertMsg.vue';
app.component('alert-component', AlertMsg);
import Paginate from './components/comuns/Paginate.vue';
app.component('paginate-component', Paginate);
import Table from './components/comuns/Table.vue';
app.component('tabela-component', Table);
import Bikes from './components/layouts/Bikes.vue';
app.component('bikes-component', Bikes);
import Garantia from './components/layouts/Garantia.vue';
app.component('garantia-component', Garantia);
import Contatos from './components/layouts/Contatos.vue';
app.component('contatos-component', Contatos);
import Registros from './components/layouts/Registros.vue';
app.component('registros-component', Registros);
import Gallery from './components/frontend/Gallery.vue';
app.component('produtosgallery-component', Gallery);
import Conteudo from './components/frontend/Conteudo.vue';
app.component('conteudo-component', Conteudo);




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
