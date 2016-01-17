<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use Redirect;
use Blog\Http\Requests;
use Blog\Http\Requests\NoticeCreateRequest;
use Blog\Http\Controllers\Controller;


class User extends Model {

    protected $fillable = ['first_name', 'last_name', 'email'];

}
class NoticeController extends Controller
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
        $users = \Blog\Notice::paginate(1);
        $users = $users->orderBy('created_at', 'desc')->get();
        return view('index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeCreateRequest $request)
    {
        $notice = new \Blog\Notice;

        $notice->titulo = $request->titulo;
        $notice->content = $request->content;
        $notice->autor = $request->autor;

        $notice->save();
        Session::flash('message','Post Publicado correctamente');
        return redirect('/');
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
        $notice = \Blog\Notice::find($id);
        return view('notice.edit',['notice'=>$notice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = \Blog\Notice::find($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message','Post actualizado');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Blog\Notice::destroy($id);
        Session::flash('message','Post borrado correctamente');
        return Redirect::to('/');
    }
}
