import { AxiosRequestConfig } from "axios";
import { OlympicGameApi } from "@/apis/OlympicGameApi";

interface SaveResponse {
   message: string;
}
interface Response {
   data: OlympicHeadquarter[];
}

export interface OlympicHeadquarter {
   id?: number;
   name: string;
   location: string;
   number_of_complexes: number;
   budget: number;
}

export class OlympicHeadquarterService extends OlympicGameApi {
   public constructor(config?: AxiosRequestConfig) {
      super(config);
   }

   public async getAll() {
      try {
         const result = await this.get<Response>("api/sedes-olimpicas");
         return this.success(result).data;
      } catch (error) {
         throw error.response.data;
      }
   }

   public async add(data: OlympicHeadquarter) {
      try {
         const result = await this.post<SaveResponse, OlympicHeadquarter>(
            "api/sedes-olimpicas",
            data
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }

   public async update(data: OlympicHeadquarter) {
      try {
         const result = await this.put<SaveResponse, OlympicHeadquarter>(
            `api/sedes-olimpicas/${data.id}`,
            data
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }

   public async removeById(id: number) {
      try {
         const result = await this.delete<SaveResponse>(
            `api/sedes-olimpicas/${id}`
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }
}

export const olympicHeadquarterService = new OlympicHeadquarterService();
