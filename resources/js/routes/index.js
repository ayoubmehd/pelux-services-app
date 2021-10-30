import { getLoggedInUser } from "../api/auth.js";
import VueRouter from "vue-router";
import routes from "./routes.js";

const router = new VueRouter({
    mode: "history",
    linkActiveClass: "navbar__link--active",
    routes
});

router.beforeEach(async (to, from, next) => {

    const [res, error] = await getLoggedInUser();

    const { role } = res;

    if (to.meta.noLoggedInUser) {
        if (res.statusCode === 200) {
            next('/');
            return;
        }
        if (!error) {
            next('/');
            return;
        }
    }

    if (to.meta.provider) {
        if (role === 'user') {
            next({ name: "Home" });
            return;
        }
    }

    if (to.meta.login) {
        if (error) {
            next({ name: "Login" });
            return;
        }

        if (res.statusCode >= 300) {
            next({ name: "Login" });
            return;
        }
    }

    next();
});

export default router;