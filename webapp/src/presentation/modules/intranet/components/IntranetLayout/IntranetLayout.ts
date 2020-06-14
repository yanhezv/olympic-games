import { Component, Vue } from "vue-property-decorator";
import { authService } from "@/presentation/services/AuthService";
import { Notify } from "@/presentation/elements/Notify";

@Component
export default class IntranetLayout extends Vue {
   private breakpoint = 768;
   private isOpenDrawer = false;
   private username = "OMAR";

   private logout() {
      authService
         .logout()
         .then(() => {
            Notify.success("Nos vemos pronto. Cuídese");
            this.$router.push({ name: "login" });
         })
         .catch(error => {
            console.log(error);
         });
   }
}
