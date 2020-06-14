import { Dialog as QDialog } from "quasar";

export const Dialog = {
   confirm(titleText: string, messageText: string) {
      return QDialog.create({
         title: titleText,
         message: messageText,
         ok: true,
         cancel: true,
         color: "primary"
      });
   }
};
