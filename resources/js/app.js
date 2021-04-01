require('./bootstrap');

import Vue from 'vue';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import colors from 'vuetify/lib/util/colors';

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
Vue.use(Vuetify)
Vue.use(colors)


import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.component('asd', require('./Pages/asd.vue').default);
Vue.component('s-jawab', require('./Pages/components/FormJawaban').default);

const app = document.getElementById('app');
import {
    store
} from './store/store'
new Vue({
           store,
           vuetify: new Vuetify(),
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
            
        }),
}).$mount(app);
