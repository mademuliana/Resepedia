<template>
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                </ul>
                <ul class="navbar-nav ml-auto">                
                <li class="nav-item">
                    <a  class="nav-link" href="/logout"  role="button">
                        Logout
                    <i class="fas fa-sign-out-alt text-danger"></i>
                    </a>
                </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                <img :src="'images/demo/resepedia_logo.png'" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Resepedia</span>
                </a>
                <div class="sidebar">
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img :src="'images/demo/user2-160x160.jpg'" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div> -->
                
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- <li class="nav-item" >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-coins nav-icon"></i>  
                            <p>
                                Pesanan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>    
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'pesanan' }">
                                    <i class="fas fa-circle text-primary nav-icon"></i>
                                    <p>Daftar Pesanan </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'pesananForm' }">
                                    <i class="fas fa-circle text-success nav-icon"></i>
                                    <p>Tambah Pesanan Baru </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>
                                Paket
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>    
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'paket' }">
                                    <i class="fas fa-circle text-primary nav-icon"></i>
                                    <p>Daftar Paket </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'paketForm' }">
                                    <i class="fas fa-circle text-success nav-icon"></i>
                                    <p>Tambah Paket Baru </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>  
                            <p>
                                Produk & Resep
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>    
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'produk' }">
                                    <i class="fas fa-circle text-primary nav-icon"></i>
                                    <p>Daftar Produk </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'resep' }">
                                    <i class="fa fa-circle text-primary nav-icon"></i>
                                    <p>Daftar Resep </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'produkForm' }">
                                    <i class="fas fa-circle text-success nav-icon"></i>
                                    <p>Tambah Produk Baru </p>
                                </router-link>
                            </li>
                                <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'resepForm' }">
                                    <i class="fas fa-circle text-success nav-icon"></i>
                                    <p>Tambah Resep Baru </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'rekapProduk' }">
                                    <i class="fas fa-circle text-warning nav-icon"></i>
                                    <p>Rekap Produk </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>      
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="fas fa-pepper-hot nav-icon"></i>
                        <p>
                            Bahan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>    
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'bahan' }">
                                    <i class="fas fa-circle text-primary nav-icon"></i>
                                    <p>Daftar Bahan </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" :to="{ name:'rekapBahan' }">
                                    <i class="fas fa-circle text-warning nav-icon"></i>
                                    <p>Rekap Bahan </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>      
                    <li class="nav-item ">
                            <router-link class="nav-link" :to="{ name:'kategori' }">
                                <i class="fas fa-check-square nav-icon"></i>
                                <p>Kategori </p>
                            </router-link>
                    </li>
                    <li class="nav-item">
                            <router-link class="nav-link" :to="{ name:'user' }">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Pengguna </p>
                            </router-link>
                    </li>             
                    <br>
                    </ul>
                </nav>
                </div>
            </aside>
            <div >
                <router-view></router-view>
            </div>

            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>
</template>

