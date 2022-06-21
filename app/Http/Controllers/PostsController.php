<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
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
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [ 
            'title'  => 'required',
            'content'  => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
          }

           $request->file('image')->getClientOriginalName();
 
           $path = $request->file('image')->store('public/images');;

           $pre = "public/";
           $path = substr( $path, strlen($pre));

           $post = new Posts;
           $post->title = $request->title;
           $post->content =  $request->content;
           $post->image =  $path;
           $post->status =  'checked';
           $post->save();

        return response()->json([ 'message' => 'post sucessfully created' ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::where('id',$id)->first();
        return response()->json([ 'post' => $post ]);
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

        $validator = Validator::make($request->all(), [ 
            'title'  => 'required',
            'content'  => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
          }

        Posts::where('id',$id)->update(['title'=>$request->title, 'content'=>$request->content]);
        return response()->json([ 'message' => 'post sucessfully updated' ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete(); //returns true/false
        return response()->json([ 'message' => 'post sucessfully deleted' ],200);
    }
}
