// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";
import NewService from "../views/NewService.vue";

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
    }


];

export default routes;