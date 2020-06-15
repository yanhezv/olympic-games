import axios, { AxiosRequestConfig, AxiosResponse, AxiosInstance } from "axios";

export class Api {
   protected api: AxiosInstance;

   protected constructor(config?: AxiosRequestConfig) {
      this.api = axios.create(config);
   }

   protected getUri(config?: AxiosRequestConfig): string {
      return this.api.getUri(config);
   }

   protected request<T, R = AxiosResponse<T>>(
      config: AxiosRequestConfig
   ): Promise<R> {
      return this.api.request<T, R>(config);
   }

   protected get<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.get<T, R>(url, config);
   }

   protected delete<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.delete<T, R>(url, config);
   }

   protected head<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.head<T, R>(url, config);
   }

   protected post<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.post<T, R>(url, data, config);
   }

   protected put<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.put<T, R>(url, data, config);
   }

   protected patch<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.patch<T, R>(url, data, config);
   }

   protected success<T>(response: AxiosResponse<T>): T {
      return response.data;
   }
}
