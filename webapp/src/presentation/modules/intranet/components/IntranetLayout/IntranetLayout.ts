import { Component, Vue } from "vue-property-decorator";

@Component
export default class IntranetLayout extends Vue {
   private breakpoint = 768;
   private isOpenDrawer = false;
   private username = "OMAR";

   private logout() {
      console.log("LOGOUT");
   }
}
