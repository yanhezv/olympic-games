import Vue from "vue";

import "./styles/quasar.sass";
import "@quasar/extras/roboto-font/roboto-font.css";
import "@quasar/extras/material-icons/material-icons.css";
import "@quasar/extras/material-icons-outlined/material-icons-outlined.css";
import "@quasar/extras/material-icons-round/material-icons-round.css";
import "@quasar/extras/material-icons-sharp/material-icons-sharp.css";
import {
   Quasar,
   QLayout,
   QHeader,
   QDrawer,
   QPageContainer,
   QPage,
   QToolbar,
   QToolbarTitle,
   QBtn,
   QIcon,
   QList,
   QItem,
   QItemSection,
   QItemLabel,
   QSpace,
   QBtnDropdown,
   QSeparator,
   QInput,
   ClosePopup,
   Ripple
} from "quasar";

Vue.use(Quasar, {
   config: {},
   components: {
      QLayout,
      QHeader,
      QDrawer,
      QPageContainer,
      QPage,
      QToolbar,
      QToolbarTitle,
      QBtn,
      QIcon,
      QList,
      QItem,
      QItemSection,
      QItemLabel,
      QSpace,
      QBtnDropdown,
      QSeparator,
      QInput
   },
   directives: {
      ClosePopup,
      Ripple
   },
   plugins: {}
});
