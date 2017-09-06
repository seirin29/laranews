<?php

use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/post/{id}', function($id){
	//return "This is post number ".$id;
//});

//Route::get('/post/{id}', 'PostsController@index'.$id);

Route::resource('posts', 'PostsController');
Route::get('/contact', 'PostsController@contact');
Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');

Route::get('/read', function(){
	$posts = Post::all();
	foreach($posts as $post){
		return $post->title;
	}
});

Route::get('/find', function(){
	$post = Post::find(3);
	return $post->title;
});

Route::get('/findwhere', function(){
	$posts = Post::where('is_admin', 0)->orderBy('id', 'desc')->take(1)->get();
	return $posts;
});

Route::get('/findmore', function(){
	$posts = Post::findOrFail(5);
	return $posts;
});

Route::get('/basicinsert', function(){
	$post = new Post;
	$post->title = 'New Eloquent Title';
	$post->content = 'Wow Eloquent is really cool';
	$post->save();
});

Route::get('/create', function(){
	Post::create(['title' => 'create method', 'content' => 'saya belajar banyak hari ini']);
});

//Database Raw SQL Queries

//Route::get('/insert', function(){
	//DB::insert("insert into posts(title, content) values(?, ?)",
				//['PHP with Laravel', 'Laravel is the Best Thing that happen to PHP']);
				
//});

//Route::get('/read', function(){
	//$results = DB::select("select * from posts where id = ?", [2]);
	//foreach($results as $posts){
		//return $posts->title;
	//}
	//return $results;
//});

//Route::get('/update', function(){
	//$updated = DB::update("update posts SET title = 'update Laravel' where id = ?", [3]);
	//return $updated;
//});


//Route::get('/delete', function(){
	//$deleted = DB::delete("delete from posts where id = ?", [2]);
	//return $deleted;
//});


