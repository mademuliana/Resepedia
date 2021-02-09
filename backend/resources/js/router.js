import Vue from 'vue'
import VueRouter from 'vue-router'

// form
import DefaultForm from './views/form/DefaultForm.vue'
import ProdukForm from './views/form/ProdukForm.vue'
import ResepForm from './views/form/ResepForm.vue'
import PaketForm from './views/form/PaketanForm.vue'
import PesananForm from './views/form/PesananForm.vue'
import UserForm from './views/form/UsersForm.vue'
import BahanForm from './views/form/BahanForm.vue'
import KategoriForm from './views/form/KategoriForm.vue'

// tables
import DefaultTables from './views/tables/DefaultTables.vue'
import BahanTables from './views/tables/BahanTables.vue'
import ProdukTables from './views/tables/ProdukTables.vue'
import ResepTables from './views/tables/ResepTables.vue'
import PaketTables from './views/tables/PaketTables.vue'
import PesananTables from './views/tables/PesananTables.vue'
import UserTables from './views/tables/UsersTables.vue'
import KategoriTables from './views/tables/KategoriTables.vue'

//export
import Rekap from './views/default.vue'
import RekapProdukTables from './views/tables/RekapProdukTables.vue'
import RekapBahanTables from './views/tables/RekapBahanTables.vue'







Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/form',
            name: 'form',
            component: DefaultForm,
        },
        {
            path: '/produkForm',
            name: 'produkForm',
            component: ProdukForm,
        },
        {
            path: '/resepForm',
            name: 'resepForm',
            component: ResepForm,
        },
        {
            path: '/paketForm',
            name: 'paketForm',
            component: PaketForm,
        },
        {
            path: '/pesananForm',
            name: 'pesananForm',
            component: PesananForm,
        },
        {
            path: '/bahanForm',
            name: 'bahanForm',
            component: BahanForm,
        },
        {
            path: '/kategoriForm',
            name: 'kategoriForm',
            component: KategoriForm,
        },
        {
            path: '/userForm',
            name: 'userForm',
            component: UserForm,
        },
        // Tables Routing
        {
            path: '/',
            name: 'tables',
            component: DefaultTables,
        },
        {
            path: '/bahan',
            name: 'bahan',
            component: BahanTables,
        },
        {
            path: '/produk',
            name: 'produk',
            component: ProdukTables,
        },
        {
            path: '/resep',
            name: 'resep',
            component: ResepTables,
        },
        {
            path: '/paket',
            name: 'paket',
            component: PaketTables,
        },
        {
            path: '/pesanan',
            name: 'pesanan',
            component: PesananTables,
        },
        {
            path: '/kategori',
            name: 'kategori',
            component: KategoriTables,
        },
        {
            path: '/user',
            name: 'user',
            component: UserTables,
        },
        {
            path: '/rekap/produk',
            name: 'rekapProduk',
            component: RekapProdukTables,
        },
        {
            path: '/rekap/bahan',
            name: 'rekapBahan',
            component: RekapBahanTables,
        },
    ],

   
    
})

export default router