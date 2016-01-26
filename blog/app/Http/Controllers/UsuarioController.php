<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use Blog\Http\Requests;
use Blog\Http\Requests\UserCreateRequest;
use Blog\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        \Blog\User::create([
            'apodo' => $request['apodo'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'nivel' => 0,
            'imagen' => 'default.png',
        ]);
        Session::flash('message','Registrado');
        return Redirect::to('/');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function photo()
    {
        return view('usuario.photo');
    }
    public function photo2()
    {
       
    }
}
