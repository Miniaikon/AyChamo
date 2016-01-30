<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Farcades\Input;
use Auth;
use Session;
use Redirect;
use Blog\Http\Requests;
use Blog\Http\Requests\NoticeCreateRequest;
use Blog\Http\Controllers\Controller;


class NoticeController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>['index','create','store','edit','uldate','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = \Blog\Notice::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.lista',compact('users'));
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
        $notice->autor = Auth::user()->apodo;
        $notice->cate = $request->cate;

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
    public function show($id,Request $request)
    {
        $users = \Blog\Notice::orderBy('created_at', 'desc')->where('id', $id)->get();
        $comments = \Blog\Comments::orderBy('created_at', 'asc')->where('id_noticia', $id)->get(); 
        return view('review',compact('users','comments','user'));
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
        $notice = \Blog\Notice::find($id);
        $notice->fill($request->all())->save();
        // $notice->save();

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
        return back()->withInput();
    }
}