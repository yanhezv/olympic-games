import { Component, Vue } from "vue-property-decorator";

@Component
export default class LoginPage extends Vue {
   private email = "";
   private password = "";
   private confirmPassword = "";
   private isPassword = true;
   private isConfirmPassword = true;

   private signUp() {
      console.log("SIGN UP");
   }
}
