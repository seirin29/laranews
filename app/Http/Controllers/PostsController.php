<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index($id)
    //{
        //
		//return "Hello.. Berhasil Coy, ini post no. ";
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    //{
        //
		//return "I am the method that create stuff.";
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    //{
        //
    //}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //{
        //
		//return "This is the show method... yeayy" . $id;
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id)
    //{
        //
    //}
	
	//public function contact(){
		//$people = ['alex','budi','chandra','dewi','edwin'];
		//return view('contact', compact('people'));
	//}
	
	//public function show_post($id, $name, $password){
		//return view('post')->with('id',$id);
		//return view('post',compact('id','name','password'));
	//}
	
	
	public function create()
	{
		return view('posts.create');
	}
	
	
	//Cara 1
	//public function store(Request $request)
	//{
		//return $request->get('title');
	//}
	
	
	
	//Cara 2
	//public function store(Request $request)
	//{
		//return $request->title;
	//}
	
	public function store(Request $request)
	{
		//Cara 1
		Post::create($request->all());
		//Cara 2
		//$post = new Post;
		//$post->title = $request->title;
		//$post->save();
		
		return redirect('/posts');
	}
	
	
	public function index()
	{	
		$posts = Post::all();
		return view('posts.index', compact('posts'));
	}
	
	//gak jalan	
	public function show($id)
	{
		$posts = Post::show($id);
		return view('posts.show', compact('post'));
		
	}
	
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return view('posts/edit', compact('post'));
	}
	
	public function update(Request $request, $id)
	{
		//return "IT's Working";
		
		//gak jalan
		//return $request->all();
		
		$post = Post::findOrFail($id);
		$post->update($request->all());
		return redirect('/posts');
		
		
	}
	
	
	
}
