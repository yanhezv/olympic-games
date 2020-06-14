import { LocalKey } from "@/toolboxes/constants/storage";

interface User {
   username: string;
   email: string;
}

export interface UserToken {
   access_token: string;
   expires_at: string;
   token_type: string;
}

export class UserStorage {
   public setUser(user: User) {
      localStorage.setItem(LocalKey.User, JSON.stringify(user));
   }

   public getUser() {
      return localStorage.getItem(LocalKey.User);
   }

   public removeUser() {
      return localStorage.removeItem(LocalKey.User);
   }

   public getToken() {
      const tokenInfo = localStorage.getItem(LocalKey.Token);
      if (tokenInfo) {
         return JSON.parse(tokenInfo) as UserToken;
      }
      return null;
   }

   public setToken(tokenInfo: UserToken) {
      localStorage.setItem(LocalKey.Token, JSON.stringify(tokenInfo));
   }

   public removeToken() {
      localStorage.removeItem(LocalKey.Token);
   }
}

export const userStorage = new UserStorage();
