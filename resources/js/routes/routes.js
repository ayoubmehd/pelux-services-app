// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";
import NewService from "../views/provider/NewService.vue";
import SingleOrder from "../views/provider/SingleOrder.vue";
import SingleService from "../views/SingleService.vue";
import Description from "../views/service/Description.vue";

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
        children: [
            {
                path: "/",
                name: "Description",
                component: Description,
            }
        ]
    },
    {
        path: "/provider/orders/:id",
        name: "SingleOrder",
        component: SingleOrder,
        children: [
            {
                path: "/",
                name: "OrderDescription",
                component: Description,
            }
        ]
    },

];

export default routes;