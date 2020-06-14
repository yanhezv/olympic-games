import { RouteConfig } from "vue-router";

import AuthtLayout from "@/presentation/modules/auth/components/AuthtLayout/AuthtLayout.vue";
import IntranetLayout from "@/presentation/modules/intranet/components/IntranetLayout/IntranetLayout.vue";

const LoginPage = () =>
   import(
      /* webpackChunkName: "login" */ "@/presentation/modules/auth/pages/Login/LoginPage.vue"
   );
const SignUpPage = () =>
   import(
      /* webpackChunkName: "login" */ "@/presentation/modules/auth/pages/SignUp/SignUpPage.vue"
   );
const DashboardPage = () =>
   import(
      /* webpackChunkName: "dashboard" */ "@/presentation/modules/intranet/pages/Dashboard/DashboardPage.vue"
   );
const OlympicHeadquarterPage = () =>
   import(
      /* webpackChunkName: "dashboard" */ "@/presentation/modules/intranet/pages/OlympicHeadquarter/OlympicHeadquarterPage.vue"
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
         },
         {
            path: "/sign-up",
            name: "signUp",
            component: SignUpPage
         }
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
         },
         {
            path: "olympic-headquarter",
            name: "olympicHeadquarter",
            component: OlympicHeadquarterPage
         }
      ]
   },
   {
      path: "*",
      redirect: "/login"
   }
];
