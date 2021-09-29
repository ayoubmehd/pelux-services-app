import { getCities } from "../../api/cities";

export default {
    state: () => ({
        cities: []
    }),
    mutations: {
        setCities(state, payload) {
            state.cities = payload;
        }
    },
    actions: {
        async fetchCities({ commit }) {

            commit('setLoading', true);
            const [data, error] = await getCities();
            commit('setLoading', false);

            if (error) {
                commit('setErrors', error);
            }

            commit('setCities', data);

        }
    },
    getters: {}
};