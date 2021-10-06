// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";
import NewService from "../views/provider/NewService.vue";
// import ProviderSingleService from "../views/provider/SingleService.vue";
import SingleService from "../views/SingleService.vue";

const routes = [
    // {
    //     path: "/post/:id",
    //     name: "SinglePost",
    //     component: SinglePost,
    //     meta: {
    //         login: true,
    //     },
    // }
    {
        path: "/services/new",
        name: "NewService",
        component: NewService,
    },
    {
        path: "/services/:id",
        name: "SingleService",
        component: SingleService,
    },
    // {
    //     path: "provider/services/:id",
    //     name: "ProviderSingleService",
    //     component: ProviderSingleService,
    // },

];

export default routes;