import { getCategories } from "../../api/categories.js";

export default {
    state: () => ({
        categories: []
    }),
    mutations: {
        setCategories(state, payload) {
            state.categories = payload;
        }
    },
    actions: {
        async fetchCategories({ commit }) {

            commit('setLoading', true);
            const [data, error] = await getCategories();
            commit('setLoading', false);

            if (error) {
                commit('setErrors', error);
            }

            commit('setCategories', data);

        }
    },
    getters: {}
};