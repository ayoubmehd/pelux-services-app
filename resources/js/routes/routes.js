// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";
import NewService from "../views/provider/NewService.vue";
import SingleOrder from "../views/provider/SingleOrder.vue";
import SingleService from "../views/SingleService.vue";
import AllServices from "../views/AllServices.vue";
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
        path: "/services",
        name: "AllServices",
        component: AllServices,
    },
    {
        path: "/services/new",
        name: "NewService",
        component: NewService,
        meta: {
            login: true,
            provider: true
        },
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
            },
            {
                path: "orders",
                name: "Orders",
                component: () => import("../views/provider/Orders.vue"),
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
            },
        ],
        meta: {
            login: true,
            provider: true
        },
    },
    {
        path: "/auth/login",
        name: "Login",
        component: () => import("../views/Auth/Login.vue"),
        meta: {
            layout: "Empty",
            noLoggedInUser: true
        },
    },
    {
        path: "/auth/register",
        name: "Register",
        component: () => import("../views/Auth/Register.vue"),
        meta: {
            layout: "Empty",
            noLoggedInUser: true
        },
    }
];

export default routes;