import { saveService, updateService } from "../../../api/provider/services.js";


export default {
    namespaced: true,
    state: () => ({
        editing: null
    }),
    mutations: {
        setCategories(state, payload) {
            state.categories = payload;
        },
        setEditing(state, payload) {
            state.editing = payload;
        }
    },
    actions: {
        async saveService({ commit, state }, payload) {

            if (!payload.title) return;
            if (!payload.content) return;
            if (!payload.city) return;


            commit('setLoading', true, { root: true });

            let response;
            if (!state.editing)
                response = await saveService(payload);

            if (state.editing)
                response = await updateService(payload, state.editing.id);

            commit('setLoading', false, { root: true });

            const [data, error] = response;

            if (error) {
                commit('setErrors', error, { root: true });
            }

            if (!error) {
                commit('setEditing', data);
                console.log(data);
            }
        },
        async publishService({ commit, dispatch }, payload) {
            payload = { ...payload, is_publised: true };
            dispatch('saveService', payload);
        }
    },
    getters: {}
};