import { AxiosRequestConfig } from "axios";
import { OlympicGameApi } from "@/apis/OlympicGameApi";

interface SaveResponse {
   message: string;
}
interface Response {
   data: SportComplex[];
}

export enum ComplexType {
   UniqueSport = "1",
   SportCenter = "2"
}

export interface SportComplex {
   id?: number;
   location: string;
   head_of_organization: string;
   total_area: number;
   complex_type: ComplexType | string;
   olympic_headquarter_id: number;
}

export class SportComplexService extends OlympicGameApi {
   public constructor(config?: AxiosRequestConfig) {
      super(config);
   }

   public async getAll() {
      try {
         const result = await this.get<Response>("api/complejos-deportivos");
         return this.success(result).data;
      } catch (error) {
         throw error.response.data;
      }
   }

   public async add(data: SportComplex) {
      try {
         const result = await this.post<SaveResponse, SportComplex>(
            "api/complejos-deportivos",
            data
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }

   public async update(data: SportComplex) {
      try {
         const result = await this.put<SaveResponse, SportComplex>(
            `api/complejos-deportivos/${data.id}`,
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
            `api/complejos-deportivos/${id}`
         );
         return this.success(result);
      } catch (error) {
         throw error.response.data;
      }
   }
}

export const sportComplexService = new SportComplexService();
