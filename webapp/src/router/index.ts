import Vue from "vue";
import Router from "vue-router";

import { routes } from "./routes";
import { userStorage } from "@/presentation/storages/UserStorage";

Vue.use(Router);

export const router = new Router({
   mode: "history",
   base: process.env.BASE_URL,
   routes
});

router.beforeEach((to, from, next) => {
   const currentUser = userStorage.getToken();
   const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

   if (requiresAuth && !currentUser) {
      next({ name: "login" });
   } else if (!requiresAuth && currentUser) {
      next({ name: "dashboard" });
   } else {
      next();
   }
});
