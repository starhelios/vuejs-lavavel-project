import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        testVuex: '123'
    },
    mutations: {
        setTest(state , testVuex){
            state.testVuex = testVuex
        }
    }
})

