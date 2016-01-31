<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Blog\Http\Requests;
use Blog\Http\Requests\UserCreateRequest;
use Blog\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \Blog\User::orderBy('id', 'asc')->paginate(50);
        return view('admin.usuarios', compact('users'));
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
    public function store(Request $request)
    {
        //
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
        $users = \Blog\User::find($id);
        return view('admin.conf.lvl',['users'=>$users]);
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
         $user = \Blog\User::find($id);
        $user->fill([
            'nivel' => $request['nivel'],
            ])->save();
        // $notice->save();

        Session::flash('message','Usuario nivelado');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Blog\User::destroy($id);
        Session::flash('message','Usuario baneado corectamente');
        return back()->withInput();
    }
}
