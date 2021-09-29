import Vue from 'vue';
import Vuex, { createLogger } from 'vuex';

import cities from "./modules/cities.js";
import categories from "./modules/categories";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    state: {
        error: null,
        isLoading: false
    },
    mutations: {
        setErrors(state, payload) {
            state.error = payload;
        },
        setLoading(state, payload) {
            state.isLoading = payload;
        }
    },
    strict: debug,
    modules: {
        cities,
        categories
    },
    plugins: debug ? [createLogger()] : []
});