import { Login, Register } from "../../api/auth.js";

export default {
    state: () => ({}),
    mutations: {},
    actions: {
        toFormData({ }, form) {
            const formData = new FormData();
            for (let key in form) {
                formData.append(`${key}`, form[key]);
            }
            return formData;
        },
        async Login({ commit, dispatch }, form) {
            commit("setLoading", true);
            const formData = await dispatch("toFormData", form);
            const [res, error] = await Login(formData);
            commit("setLoading", false);
            if (error) {
                commit("setErrors", error);
            }
        },
        async Register({ commit, dispatch }, form) {
            commit("setLoading", true);
            const formData = await dispatch("toFormData", form);
            const [res, error] = await Register(formData);
            commit("setLoading", false);
            if (error) {
                commit("setErrors", error);
            }
        }
    },
    getters: {}
};