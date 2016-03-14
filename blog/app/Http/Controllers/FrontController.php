<?php

namespace Blog\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use File;
use Input;
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

    private $folder = 'imagen';
    public function uploader()
    {
        $files = File::files($this->folder);
        return View('app.uploader')->with('images',$files);
    }

    public function store()
    {
        $file = Input::file('filename');
        $name = $file->getClientOriginalName();

        $upload = $file->move(public_path().'/imagen', $name);
        

        if($upload){
            Session::flash('message','Guardado');
            Session::flash('class','success');
        } else {
            Session::flash('message','Error al guardar');
            Session::flash('class','danger');

        }

        return back()->withInput();
    }

    public function destroy($id = null) { 
        chmod($this->folder.'/'.$id, 0777);

        if(unlink($this->folder.'/'.$id)){
            Session::flash('message','Imagen eliminada');
            Session::flash('class','success');
        } else {
            Session::flash('message','Error al eliminar');
            Session::flash('class','danger');

        }

        return back()->withInput();
    }

}
