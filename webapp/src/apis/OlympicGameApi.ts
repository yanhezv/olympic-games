import { AxiosRequestConfig, AxiosResponse } from "axios";

import { API_URL_BASE } from "@/toolboxes/constants/app";
import { Api } from "./Api";
import { userStorage } from "@/presentation/storages/UserStorage";

interface ApiResponse<T = any> {
   success: boolean;
   data: T;
}

export class OlympicGameApi extends Api {
   public constructor(config?: AxiosRequestConfig) {
      super({
         baseURL: API_URL_BASE,
         ...config
      });

      this.api.interceptors.request.use((param: AxiosRequestConfig) => {
         let headers = param.headers;

         const token = userStorage.getToken();
         if (token) {
            const Authorization = `${token.token_type} ${token.access_token}`;
            headers = { ...headers, Authorization };
         }

         return {
            ...param,
            headers
         };
      });

      this.api.interceptors.response.use(
         (param: AxiosResponse<ApiResponse>) => {
            return {
               ...param,
               data: param.data
            };
         }
      );
   }
}
