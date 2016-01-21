<?php

namespace Blog\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use Redirect;
use App\Post;
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
         $users = \Blog\Notice::orderBy('created_at', 'desc')->paginate(5);

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

    public function humor()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Humor')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function noticia()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Noticias')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function imagen()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Imagenes')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function video()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Videos')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function resena()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Reseñas')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function otro()
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('cate', 'Otros')->paginate(5);

        return view('filter.humor',compact('users'));
    }

    public function review($id)
    {
        return "Funciona!";
    }
}
