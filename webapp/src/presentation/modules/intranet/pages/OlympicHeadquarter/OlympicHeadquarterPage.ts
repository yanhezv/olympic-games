import { Component, Vue } from "vue-property-decorator";
import { moneyFormat } from "@/toolboxes/helpers/money";
import {
   olympicHeadquarterService,
   OlympicHeadquarter
} from "@/presentation/services/OlympicHeadquarterService";
import { Notify } from "@/presentation/elements/Notify";
import { Dialog } from "@/presentation/elements/Dialog";

@Component
export default class OlympicHeadquarterPage extends Vue {
   private loading = true;
   private dialogForm = false;
   private editMode = false;
   private filter = "";
   private currentItem: OlympicHeadquarter = {
      name: "",
      location: "",
      number_of_complexes: 0,
      budget: 0
   };
   private olympicHeadquarters: OlympicHeadquarter[] = [];

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
         name: "name",
         field: "name",
         label: "Nombre",
         align: "left",
         sortable: true
      },
      {
         name: "location",
         field: "location",
         label: "Sede",
         align: "left"
      },
      {
         name: "number_of_complexes",
         field: "number_of_complexes",
         label: "Complejos",
         align: "center",
         style: "width: 100px",
         headerStyle: "min-width: 100px"
      },
      {
         name: "budget",
         field: "budget",
         label: "Presupuesto",
         style: "width: 120px",
         headerStyle: "min-width: 120px",
         format: (value: number) => `S/ ${moneyFormat(value)}`
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
   }

   private loadData() {
      this.loading = true;

      olympicHeadquarterService
         .getAll()
         .then(data => {
            this.loading = false;
            this.olympicHeadquarters = data;
         })
         .catch(() => {
            this.loading = false;
         });
   }

   private editItem(item: OlympicHeadquarter) {
      this.currentItem = { ...item };
      this.editMode = true;
      this.dialogForm = true;
   }

   private addItem() {
      this.dialogForm = true;
      this.resetCurrentItem();
   }

   private resetCurrentItem() {
      this.currentItem = {
         name: "",
         location: "",
         number_of_complexes: 0,
         budget: 0
      };
   }

   private save() {
      const item: OlympicHeadquarter = {
         ...this.currentItem,
         number_of_complexes: parseInt(
            this.currentItem.number_of_complexes + ""
         ),
         budget: parseFloat(this.currentItem.budget + "")
      };

      if (this.editMode && item.id !== undefined) {
         olympicHeadquarterService
            .update(item)
            .then(response => {
               this.loadData();
               Notify.success(response.message);
               this.dialogForm = false;
               this.resetCurrentItem();
            })
            .catch(error => {
               console.log(error);
            });
      } else {
         olympicHeadquarterService
            .add(item)
            .then(response => {
               this.loadData();
               Notify.success(response.message);
               this.dialogForm = false;
               this.resetCurrentItem();
            })
            .catch(error => {
               console.log(error);
            });
      }
   }

   private removeItem(item: OlympicHeadquarter) {
      Dialog.confirm(
         "Eliminar",
         "¿Esta seguro de querer eliminar la sede olímpica?"
      ).onOk(() => {
         if (item.id) {
            olympicHeadquarterService
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
