<?php

use App\User;


$qwerty = "dasd";
// config(['app.qwerty' => $qwerty]);

    function role_function(){
        $id_auth= auth()->id();
        $role = User::find($id_auth);
        return $role;
    }

    function auth_function(){
        $id_auth= auth()->id();
        return $id_auth;
    }

    function username_function(){
        $id_auth= auth()->id();
        $nama_lengkap = User::find($id_auth);
        return $nama_lengkap;
    }


