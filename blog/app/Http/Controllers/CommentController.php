<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Farcades\Input;
use Auth;
use Session;
use Redirect;
use Blog\Http\Requests;
use Blog\Http\Requests\CommnetRequest;
use Blog\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommnetRequest $request)
    {
        $comment = new \Blog\Comments;

        $comment->id_noticia = $request->id;
        $comment->autor = $request->autor;
        $comment->imagen = $request->imagen;
        $comment->comentario = $request->comentario;

        $comment->save();
        Session::flash('message','Comentado');

        $notice = \Blog\Notice::find($request->id);
        $cantidad = $request->cant + 1;

        $notice->fill([
            'comment' => $cantidad,
            ]);
        $notice->save();
        return back()->withInput();
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
    public function destroy($id, Request $request)
    {
        \Blog\Comments::destroy($id);
        $notice = \Blog\Notice::find($id);
        $cantidad = $request->cantidad - 1;

        $notice->fill([
            'comment' => $cantidad,
            ]);
        $notice->save();
        Session::flash('message','Comentario borrado correctamente');
        return back()->withInput();
    }
}
