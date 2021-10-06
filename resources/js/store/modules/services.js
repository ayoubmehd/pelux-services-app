import { getService } from "../../api/services.js";

export default {
    state: () => ({
        service: {},
        services: []
    }),
    mutations: {
        setService(state, payload) {
            state.service = payload;
        }
    },
    actions: {
        async fetchService({ commit }, id) {
            commit('setLoading', true);
            const [service, error] = await getService(id);
            commit('setLoading', false);
            if (error) {
                commit('setError', error);
            }
            commit('setService', service);
        }
    },
    getters: {}
};