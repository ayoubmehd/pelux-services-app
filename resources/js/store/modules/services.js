import { getService, getSimilarServices } from "../../api/services.js";

export default {
    state: () => ({
        service: {},
        services: []
    }),
    mutations: {
        setService(state, payload) {
            state.service = payload;
        },
        setServices(state, payload) {
            state.services = payload;
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
        },
        async fetchSimilarServices({ commit }, id) {
            commit('setLoading', true);
            const [services, error] = await getSimilarServices(id);
            commit('setLoading', false);
            if (error) {
                commit('setError', error);
            }
            commit('setServices', services);
        }
    },
    getters: {}
};