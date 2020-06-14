import { AxiosRequestConfig } from "axios";
import { OlympicGameApi } from "@/apis/OlympicGameApi";
import { userStorage, UserToken } from "../storages/UserStorage";

interface Response {
   message: string;
}

interface UserParams {
   name: string;
   email: string;
   password: string;
   password_confirmation: string;
}

interface UserCredential {
   email: string;
   password: string;
}

export class AuthService extends OlympicGameApi {
   public constructor(config?: AxiosRequestConfig) {
      super(config);
   }

   public async signUp(user: UserParams) {
      try {
         const result = await this.post<Response, UserParams>(
            "api/auth/signup",
            user
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }

   public async login(credential: UserCredential) {
      try {
         const result = await this.post<UserToken, UserCredential>(
            "api/auth/login",
            credential
         );
         const tokenInfo = this.success(result);
         userStorage.setToken(tokenInfo);
         return tokenInfo;
      } catch (error) {
         throw error.response.data;
      }
   }

   public async logout() {
      try {
         const result = await this.get<Response>("api/auth/logout");
         userStorage.removeToken();
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }
}

export const authService = new AuthService();
