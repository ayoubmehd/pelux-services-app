import { getOrder } from "../../../api/provider/orders.js";

export default {
    namespaced: true,
    state: () => ({
        order: {},
        orders: []
    }),
    mutations: {
        setOrder(state, payload) {
            state.order = payload;
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
            commit('setOrder', order);
        }
    },
    getters: {}
};