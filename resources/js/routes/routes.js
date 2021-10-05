// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";
import NewService from "../views/NewService.vue";
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
        name: "NewService",
        component: SingleService,
    }


];

export default routes;