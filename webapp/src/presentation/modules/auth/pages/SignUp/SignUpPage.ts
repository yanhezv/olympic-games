import { Component, Vue } from "vue-property-decorator";
import { authService } from "@/presentation/services/AuthService";
import { Notify } from "@/presentation/elements/Notify";
import { validateEmail } from "@/toolboxes/helpers/validator";

@Component
export default class LoginPage extends Vue {
   private name = "";
   private email = "";
   private password = "";
   private confirmPassword = "";
   private isPassword = true;
   private isConfirmPassword = true;

   private signUp() {
      authService
         .signUp({
            email: this.email,
            password: this.password,
            password_confirmation: this.confirmPassword,
            name: this.name
         })
         .then(response => {
            Notify.success(response.message);
         })
         .catch(error => {
            Notify.error(error.message);
         });
   }

   private isValidEmail(value: string) {
      return validateEmail(value);
   }
}
