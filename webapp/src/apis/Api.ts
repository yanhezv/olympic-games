import axios, { AxiosRequestConfig, AxiosResponse, AxiosInstance } from "axios";

export class Api {
   protected api: AxiosInstance;

   public constructor(config?: AxiosRequestConfig) {
      this.api = axios.create(config);
   }

   public getUri(config?: AxiosRequestConfig): string {
      return this.api.getUri(config);
   }

   public request<T, R = AxiosResponse<T>>(
      config: AxiosRequestConfig
   ): Promise<R> {
      return this.api.request<T, R>(config);
   }

   public get<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.get<T, R>(url, config);
   }

   public delete<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.delete<T, R>(url, config);
   }

   public head<T, R = AxiosResponse<T>>(
      url: string,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.head<T, R>(url, config);
   }

   public post<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.post<T, R>(url, data, config);
   }

   public put<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.put<T, R>(url, data, config);
   }

   public patch<T, B, R = AxiosResponse<T>>(
      url: string,
      data?: B,
      config?: AxiosRequestConfig
   ): Promise<R> {
      return this.api.patch<T, R>(url, data, config);
   }

   public success<T>(response: AxiosResponse<T>): T {
      return response.data;
   }
}
