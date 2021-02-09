<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return response([
            'success' => true,
            'message' => 'List Semua data',
            'data' => $data
        ], 200);
    }
    public function androUser($key)
    {
        $data = User::all();
        if($key==208222956){
            return response([
                'success' => true,
                'message' => 'List Semua data',
                'data' => $data
            ], 200);   
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($key,Request $request)
    {
        if($key==993552588239840924){
            $user = New User;
            $user->nama_user = $request->input('nama_lengkap');
            $user->username = $request->input('username');
            $user->role = $request->input('role');
            $user->jenis_kelamin = $request->input('jenis_kelamin');
            $user->password = $request->input('password');
            $user->save();
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($key,Request $request, $id)
    {
        if($key==993552588239840924){
            $user = User::whereId($id)->update([
                'nama_user'             => $request->input('nama_lengkap'),
                'username'              => $request->input('username'),
                'password'              => $request->input('password'),
                'jenis_kelamin'         => $request->input('jenis_kelamin'),
                'password'              => $request->input('password'),
            ]);
        }else{
            return response([
                'success' => true,
                'message' => 'Who the Fuck are you?',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($key,$id)
    {   if($key==993552588239840924){
            $data = User::findOrFail($id);
            $data->delete();
        }
    }
}
