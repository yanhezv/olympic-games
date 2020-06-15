import { Component, Vue } from "vue-property-decorator";
import { moneyFormat } from "@/toolboxes/helpers/money";
import {
   olympicHeadquarterService,
   OlympicHeadquarter
} from "@/presentation/services/OlympicHeadquarterService";
import {
   sportComplexService,
   SportComplex,
   ComplexType
} from "@/presentation/services/SportComplexService";
import { Notify } from "@/presentation/elements/Notify";
import { Dialog } from "@/presentation/elements/Dialog";

interface HeadquarterOptionSelect {
   label: string;
   value: number;
}

interface ComplexTypeSelect {
   label: string;
   value: ComplexType;
}

@Component
export default class SportComplexPage extends Vue {
   private loading = true;
   private dialogForm = false;
   private editMode = false;
   private filter = "";
   private currentItem: SportComplex = {
      location: "",
      head_of_organization: "",
      total_area: 0,
      complex_type: ComplexType.UniqueSport,
      olympic_headquarter_id: 0
   };
   private sportComplexs: SportComplex[] = [];
   private olympicHeadquarters: OlympicHeadquarter[] = [];

   protected headquarterSelected: HeadquarterOptionSelect | null = null;
   protected headquarters: HeadquarterOptionSelect[] = [];

   protected complexTypeSelected: ComplexTypeSelect = {
      label: "Unideportivo",
      value: ComplexType.UniqueSport
   };
   protected complexTypes: ComplexTypeSelect[] = [
      {
         label: "Unideportivo",
         value: ComplexType.UniqueSport
      },
      {
         label: "Polideportivo",
         value: ComplexType.SportCenter
      }
   ];

   private columns = [
      {
         name: "number_order",
         field: "number_order",
         label: "N°",
         require: false,
         align: "center",
         style: "width: 50px",
         headerStyle: "width: 50px"
      },
      {
         name: "location",
         field: "location",
         label: "Ubicación",
         align: "left",
         sortable: true
      },
      {
         name: "head_of_organization",
         field: "head_of_organization",
         label: "Jefe organizador",
         align: "left",
         sortable: true
      },
      {
         name: "total_area",
         field: "total_area",
         label: "Área total",
         style: "width: 100px",
         headerStyle: "min-width: 100px",
         format: (value: number) => `${moneyFormat(value)} m²`
      },
      {
         name: "complex_type",
         field: "complex_type",
         label: "Tipo",
         style: "width: 120px",
         headerStyle: "min-width: 120px",
         format: (value: ComplexType) => {
            console.log(value);
            return value === ComplexType.UniqueSport
               ? "Unideportivo"
               : "Polideportivo";
         }
      },
      {
         name: "actions",
         field: "actions",
         label: "Acciones",
         align: "center",
         style: "width: 100px",
         headerStyle: "width: 100px"
      }
   ];

   private created() {
      this.loadData();
      olympicHeadquarterService.getAll().then(data => {
         this.olympicHeadquarters = data;
         this.headquarters = data.map(element => ({
            label: element.name,
            value: element.id || 0
         }));
      });
   }

   private loadData() {
      this.loading = true;

      sportComplexService
         .getAll()
         .then(data => {
            this.loading = false;
            this.sportComplexs = data;
         })
         .catch(() => {
            this.loading = false;
         });
   }

   private editItem(item: SportComplex) {
      this.currentItem = { ...item };
      this.editMode = true;
      this.dialogForm = true;
      this.headquarterSelected =
         this.headquarters.find(
            value => value.value === item.olympic_headquarter_id
         ) || null;
      this.complexTypeSelected =
         this.complexTypes.find(value => value.value === item.complex_type) ||
         this.complexTypes[0];
   }

   private addItem() {
      this.dialogForm = true;
      this.resetCurrentItem();
   }

   private resetCurrentItem() {
      this.editMode = false;
      this.currentItem = {
         location: "",
         head_of_organization: "",
         total_area: 0,
         complex_type: ComplexType.UniqueSport,
         olympic_headquarter_id: 0
      };
      this.headquarterSelected = null;
      this.complexTypeSelected = this.complexTypes[0];
   }

   private save() {
      const item: SportComplex = {
         ...this.currentItem,
         total_area: parseFloat(this.currentItem.total_area + ""),
         complex_type: this.complexTypeSelected.value,
         olympic_headquarter_id: this.headquarterSelected
            ? this.headquarterSelected.value
            : 0
      };

      if (item.olympic_headquarter_id !== 0) {
         if (this.editMode && item.id !== undefined) {
            sportComplexService
               .update(item)
               .then(response => {
                  this.loadData();
                  Notify.success(response.message);
                  this.dialogForm = false;
                  this.resetCurrentItem();
               })
               .catch(() => {
                  Notify.success("Surgió un error inesperado.");
               });
         } else {
            sportComplexService
               .add(item)
               .then(response => {
                  this.loadData();
                  Notify.success(response.message);
                  this.dialogForm = false;
                  this.resetCurrentItem();
               })
               .catch(() => {
                  Notify.success("Surgió un error inesperado.");
               });
         }
      } else {
         Notify.info("No ha seleccionado una sede olímpica.");
      }
   }

   private removeItem(item: SportComplex) {
      Dialog.confirm(
         "Eliminar",
         "¿Esta seguro de querer eliminar el complejo deportivo?"
      ).onOk(() => {
         if (item.id) {
            sportComplexService
               .removeById(item.id)
               .then(response => {
                  this.loadData();
                  Notify.success(response.message);
               })
               .catch(error => {
                  Notify.error(error.message);
               });
         }
      });
   }
}
