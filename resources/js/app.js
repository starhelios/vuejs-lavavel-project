/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import { InertiaApp } from "@inertiajs/inertia-vue";
import { store } from "./store";

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

import Fragment from "vue-fragment";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

Vue.use(Fragment.Plugin);

Vue.component("v-select", vSelect);
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = document.getElementById("app");

Vue.mixin({
    data() {
        return {
            AG_ICON: {
                DOWNLOAD: "download.svg",
                SEARCH: "search.svg",
                EDIT: "edit.svg",
                DELETE: "delete.svg",
                MORE: "more.svg",
                CHECKED: "checked.svg",
                UN_CHECKED: "unchecked.svg",
                ARROW_DOWN: "arrow-down.svg",
                ARROW_LEFT: "arrow-left.svg",
                ARROW_RIGHT: "arrow-right.svg"
            }
        };
    }
});

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
