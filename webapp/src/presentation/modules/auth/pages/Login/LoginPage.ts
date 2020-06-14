import { Component, Vue } from "vue-property-decorator";
import { authService } from "@/presentation/services/AuthService";
import { Notify } from "@/presentation/elements/Notify";
import { validateEmail } from "@/toolboxes/helpers/validator";

@Component
export default class LoginPage extends Vue {
   private email = "";
   private password = "";
   private isPassword = true;

   private login() {
      authService
         .login({
            email: this.email,
            password: this.password
         })
         .then(() => {
            Notify.success(
               "Bienvenido al administrador de los Juegos Olímpicos."
            );
            this.$router.push({ name: "dashboard" });
         })
         .catch(error => {
            Notify.error(error.message);
         });
   }

   private isValidEmail(value: string) {
      return validateEmail(value);
   }
}
