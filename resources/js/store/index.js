import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        testVuex: '123',
        pagesNumber: 5,
        currentPage: 1,
        filters: {},

    },
    mutations: {
        setTest(state, testVuex) {
            state.testVuex = testVuex
        },
        setPagesNumber(state, num) {
            state.pagesNumber = num
        },
        setCurrentPage(state, num) {
            state.currentPage = num
        },
        setFilters(state, filters) {
            state.filters = filters
        }
    }
})

