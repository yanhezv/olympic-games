import { Notify as QNotify } from "quasar";

export const Notify = {
   success(messageText: string) {
      QNotify.create({
         message: messageText,
         color: "positive",
         position: "top-right"
      });
   },
   error(messageText: string) {
      QNotify.create({
         message: messageText,
         color: "negative",
         position: "top-right"
      });
   },
   info(messageText: string) {
      QNotify.create({
         message: messageText,
         color: "info",
         position: "top-right"
      });
   },
   warning(messageText: string) {
      QNotify.create({
         message: messageText,
         color: "warning",
         position: "top-right"
      });
   }
};
