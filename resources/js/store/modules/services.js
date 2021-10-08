import { getService, getServices, getSimilarServices } from "../../api/services.js";

export default {
    state: () => ({
        service: {},
        services: [],
        pagination: {
            search: "?"
        },
        firstLoad: true
    }),
    mutations: {
        setService(state, payload) {
            state.service = payload;
        },
        setServices(state, payload) {
            if (state.firstLoad) {
                state.firstLoad = false;
                state.services = payload;
                return;
            }
            state.services = [...state.services, ...payload];
        },
        setPagination(state, payload) {
            state.pagination = payload;
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
        },
        async fetchAllService({ commit, state }) {
            commit('setLoading', true);
            const [res, error] = await getServices(state.pagination.search);
            commit('setLoading', false);

            commit('setServices', res.data);
            const { next_page_url, prev_page_url, path } = res;

            const nextPageUrl = new URL(next_page_url || path);
            const prevPageUrl = new URL(prev_page_url || path);

            commit('setPagination', {
                search: nextPageUrl.search
            });

            console.debug(nextPageUrl.search);
            console.debug(prevPageUrl.search);
        }
    },
    getters: {}
};