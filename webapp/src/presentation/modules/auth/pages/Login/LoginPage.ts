import { Component, Vue } from "vue-property-decorator";

@Component
export default class LoginPage extends Vue {
   private email = "";
   private password = "";
   private isPassword = true;

   private login() {
      console.log("LOGIN");
   }
}
