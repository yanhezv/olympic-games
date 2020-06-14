import { RouteConfig } from "vue-router";

import AuthtLayout from "@/presentation/modules/auth/components/AuthtLayout/AuthtLayout.vue";
import IntranetLayout from "@/presentation/modules/intranet/components/IntranetLayout/IntranetLayout.vue";

const LoginPage = () =>
   import(
      /* webpackChunkName: "login" */ "@/presentation/modules/auth/pages/Login/LoginPage.vue"
   );
const DashboardPage = () =>
   import(
      /* webpackChunkName: "dashboard" */ "@/presentation/modules/intranet/pages/Dashboard/DashboardPage.vue"
   );

export const routes: RouteConfig[] = [
   {
      path: "/login",
      component: AuthtLayout,
      children: [
         {
            path: "",
            name: "login",
            component: LoginPage
         }
         // {
         //    path: "/sign-up",
         //    name: "signUp",
         //    component: () => import("@/screens/auth/sign-up/SignUpScreen"),
         // },
      ]
   },
   {
      path: "",
      component: IntranetLayout,
      meta: { requiresAuth: true },
      children: [
         {
            path: "",
            name: "dashboard",
            component: DashboardPage
         }
      ]
   },
   {
      path: "*",
      redirect: "/login"
   }
];
