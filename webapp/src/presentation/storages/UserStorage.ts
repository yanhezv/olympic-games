interface User {
   username: string;
   email: string;
}

class UserStorage {
   constructor() {}

   private setUser(user: User) {
      localStorage.setItem(LocalKey.User, JSON.stringify(user));
   }

   private getUser() {
      return localStorage.getItem(LocalKey.User);
   }

   private removeUser() {
      return localStorage.removeItem(LocalKey.User);
   }
}

export const userStorage = new UserStorage();
