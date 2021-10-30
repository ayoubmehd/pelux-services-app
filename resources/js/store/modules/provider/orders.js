import { getOrder, getServiceOrders } from "../../../api/provider/orders.js";

export default {
    namespaced: true,
    state: () => ({
        order: {},
        orders: [],
        pagination: {
            search: "?"
        },
    }),
    mutations: {
        setOrder(state, payload) {
            state.order = payload;
        },
        setOrders(state, payload) {
            state.orders = [...state.orders, ...payload];
        },
        setPagination(state, payload) {
            state.pagination = payload;
        }
    },
    actions: {
        async fetchOrder({ commit }, id) {
            commit('setLoading', true, { root: true });
            const [order, error] = await getOrder(id);
            commit('setLoading', false, { root: true });
            if (error) {
                commit('setError', error, { root: true });
            }
            commit('setService', order.service, { root: true });
            delete order.service;
            commit('setOrder', order);
        },
        async getServiceOrders({ commit, state }, id) {
            commit('setLoading', true, { root: true });
            const [res, error] = await getServiceOrders(id, state.pagination.search);
            commit('setLoading', false, { root: true });
            if (error) {
                commit('setError', error, { root: true });
            }

            const { next_page_url, path } = res;

            const nextPageUrl = new URL(next_page_url || path);

            commit('setPagination', {
                search: nextPageUrl.search
            });

            commit('setOrders', res.data);
        }
    },
    getters: {}
};