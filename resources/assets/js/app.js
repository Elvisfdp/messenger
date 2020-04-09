
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 /*Compoonentes para los pacientes*/
Vue.component('messenger-component', require('./components/MessengerComponent.vue'));
Vue.component('contact-component', require('./components/ContactComponent.vue'));
Vue.component('contact-list-component', require('./components/ContactListComponent.vue'));
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue'));
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue'));
Vue.component('status-component', require('./components/StatusComponent.vue'));
Vue.component('not-contact-list-component', require('./components/NotContactListComponent.vue'));
Vue.component('modal-component', require('./components/ModalComponent.vue'));

/*Componetes del Medico para hablar con medicos*/
Vue.component('messenger-medico-component', require('./components/MessengerMedicoComponent.vue'));
Vue.component('contact-medico-component', require('./components/ContactMedicoComponent.vue'));
Vue.component('contact-list-medico-component', require('./components/ContactListMedicoComponent.vue'));
Vue.component('active-conversation-medico-component', require('./components/ActiveConversationMedicoComponent.vue'));
Vue.component('message-conversation-medico-component', require('./components/MessageConversationMedicoComponent.vue'));
Vue.component('status-medico-component', require('./components/StatusMedicoComponent.vue'));

/*Componentes del medico para hablar con pacientes*/
Vue.component('messenger-paciente-component', require('./components/MessengerPacienteComponent.vue'));
Vue.component('contact-paciente-component', require('./components/ContactPacienteComponent.vue'));
Vue.component('contact-list-paciente-component', require('./components/ContactListPacienteComponent.vue'));
Vue.component('active-conversation-paciente-component', require('./components/ActiveConversationPacienteComponent.vue'));
Vue.component('message-conversation-paciente-component', require('./components/MessageConversationPacienteComponent.vue'));
Vue.component('status-paciente-component', require('./components/StatusPacienteComponent.vue'));


const app = new Vue({
    el: '#app',
    methods:{
        logout(){
            document.getElementById('logout-form').submit();
        }
    }
});
