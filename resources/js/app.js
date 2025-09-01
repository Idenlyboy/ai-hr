import './bootstrap';
import { ref } from 'vue';
import { modules } from './modules/index';
import notify from '@composables/notifyService';
import logoutService from '@composables/logoutService';
import { VueMaskDirective } from 'v-mask';

const { logoutHandler } = logoutService();

const Vue = require('vue');
const vMaskV2 = VueMaskDirective;
const vMaskV3 = { beforeMount: vMaskV2.bind, updated: vMaskV2.componentUpdated, unmounted: vMaskV2.unbind };

const app = Vue.createApp();

const auth = ref(JSON.parse(localStorage.getItem('auth')));

if (auth.value) {
    const sessionToken = auth.value.token;

    if (window.sessionToken !== sessionToken) {
        auth.value = null;
        notify.error('Пожалуйста, авторизуйтесь снова!');
        logoutHandler();
    }
}

app.directive('mask', vMaskV3);

for (const module of modules) {
    app.component(module.name, Vue.defineAsyncComponent(() => import(`${module.path}`)));
}

app.mount('#app');