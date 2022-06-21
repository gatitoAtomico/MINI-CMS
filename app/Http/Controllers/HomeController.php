<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activePosts = Posts::where('status','checked')->get();
        $inactivePosts = Posts::where('status' ,'!=','checked')->get(); 
        return view('dashboard',compact('activePosts','inactivePosts'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'title'  => 'required',
            'content'  => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $path = $request->file('image')->store('public/images');

           $pre = "public/";
           $path = substr( $path, strlen($pre));
           $input["image"] = $path;

        
        Posts::create($input);
        return redirect()->back()->with('message', 'Database Successfully Updated');
    }


    public function edit($id)
    {
        $post = Posts::where('id',$id)->first();
        return view('editPost',compact('post'));
    }

    public function update(Request $request)
    {

        $path = Posts::where('id',$request->id)->get('image')->first()->image;
   
        $request->validate([
            'title'  => 'required',
            'content'  => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);

           if ($request->hasFile('image')) {
                //remove old image
                Storage::delete('public/'.$path);
                $path = $request->file('image')->store('public/images');
                $pre = "public/";
                $path = substr( $path, strlen($pre));
           }

        Posts::where('id',$request->id)->update(['title'=>$request->title, 'content'=>$request->content,'image'=> $path]);
        return redirect()->back()->with('message', 'Database Successfully Updated');
    }


    public function create()
    {
        return view('createPost');
    }

    public function updateStatus(Request $request){
 
        //update post status
        $hasUpdated = Posts::where('id',$request->postid)->update(['status'=>strval($request->poststatus)]);

        if ($hasUpdated) {
            return response()->json( 'success');
        } 
         
        return response()->json( 'error');
    }


}
