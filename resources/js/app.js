/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import { InertiaApp } from "@inertiajs/inertia-vue";

import Fragment from "vue-fragment";
import vSelect from "vue-select";
import { store } from "./store";
import "./assets/fontawesome/css/all.css";
import "vue-select/dist/vue-select.css";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);

Vue.use(InertiaApp);
Vue.use(Fragment.Plugin);
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("breadcrumbs", require("./components/breadcrumb").default);
Vue.component("TableExpand", require("./components/Tables/Expand").default);
Vue.component("v-select", vSelect);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        }),
    store
}).$mount(app);
