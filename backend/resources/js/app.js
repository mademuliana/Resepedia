import './bootstrap'
import Vue from 'vue'
import router from './router'
import VueAxios from 'vue-axios';
import Axios from 'axios';
import Form from './Form';
import VueSimpleAlert from "vue-simple-alert";
import vuetify from './plugins/vuetify';
import CardRefresh from './plugins/CardRefresh';
import CardWidget from './plugins/CardWidget';
import ControlSidebar from './plugins/ControlSidebar';
import DirectChat from './plugins/DirectChat';
import Dropdown from './plugins/Dropdown';
import Expandable from './plugins/ExpandableTable';
import Fullscreen from './plugins/Fullscreen';
import Layout from './plugins/Layout';
import PushMenu from './plugins/PushMenu';
import SiteSearch from './plugins/SiteSearch';
import Toasts from './plugins/Toasts';
import TodoList from './plugins/TodoList';
import Treeview from './plugins/Treeview';
import vSelect from "vue-select";

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.router=router;
Vue.use(VueSimpleAlert);
Vue.component("v-select", vSelect);
Vue.use(require('vue-moment'));
Vue.use(Axios,VueAxios);
window.Form = Form;
// import 'jquery'
import 'bootstrap/dist/js/bootstrap'
import 'admin-lte/dist/js/adminlte'
import 'datatables.net';
import 'datatables.net-responsive';
import 'datatables.net-bs4';
import 'datatables.net-responsive-bs4';
import 'datatables.net-buttons';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-buttons/js/buttons.colVis';
import 'datatables.net-buttons/js/buttons.html5';
import "vue-select/dist/vue-select.css";
// import 'datatables.net-butt';
import 'datatables.net-buttons-bs4';
import 'jszip';
import 'pdfmake/build/pdfmake';
import 'pdfmake/build/vfs_fonts';
import VueEditor from "vue2-editor";
import swal from 'sweetalert2';
import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
    name: '_blank',
    specs: [
      'fullscreen=yes',
      'titlebar=yes',
      'scrollbars=yes'
    ],
    styles: [
      'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
      'https://unpkg.com/kidlat-css/css/kidlat.css'
    ]
  }
Vue.use(VueHtmlToPaper,options);
window.swal = swal;
window.Fire = new Vue();
Vue.use( VueEditor);
Vue.use( Axios,VueAxios);
window.$ = jQuery


import App from './layouts/App.vue'

new Vue({
    vuetify,
    CardRefresh,
    CardWidget,
    ControlSidebar,
    DirectChat,
    Dropdown,
    Expandable,
    Fullscreen,
    Layout,
    PushMenu,
    SiteSearch,
    Toasts,
    TodoList,
    Treeview,
    router,
    el: '#app',
    render: h => h(App),
})

