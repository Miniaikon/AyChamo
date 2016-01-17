<?php

namespace Blog\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only'=>'notice']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = \Blog\Notice::paginate(5);

        return view('index',compact('users'));
    }

    public function notice()
    {
        return view('notice');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
