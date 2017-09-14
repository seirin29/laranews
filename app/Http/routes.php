<?php

use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
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
	$role_user = new role_users;
	$role_user->user_id = '1';
	$role_user->role_id = '1';
	$role_user->save();
});

Route::get('/create', function(){
	Post::create(['title' => 'create method', 'content' => 'saya belajar banyak hari ini']);
});

Route::get('/basicupdate', function(){
	$post = Post::find(4);
	$post->title = 'Updated Eloquent Title';
	$post->content = 'Updated Eloquent Content';
	$post->save();
});

Route::get('/update', function(){
	Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'content' => 'I love learning Laravel']);
});

Route::get('/delete', function(){
	$post = Post::find(3);
	$post->delete();
});

Route::get('/delete2', function(){
	Post::destroy([6,8]);
});

Route::get('/delete3', function(){
	Post::where('id', 15)->delete();
});

Route::get('/softdelete', function(){
	Post::find(16)->delete();
});

Route::get('/readsoftdelete', function(){
	//$post = Post::find(16);
	//return $post;
	//$post = Post::withTrashed()->where('id', 16)->get();
	//return $post;
	//$post = Post::withTrashed()->get();
	//return $post;
	$post = Post::onlyTrashed()->get();
	return $post;
	
});

Route::get('/restore', function(){
	Post::withTrashed()->where('id', 16)->restore();
});

Route::get('/forcedelete', function(){
	Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
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

//One to One Relationship
Route::get('user/{id}/post', function($id){
	return User::find($id)->post->title;
});

Route::get('/post/{id}/user', function($id){
	return Post::find($id)->user->name;
});

//One to Many Relationship
Route::get('/posts', function(){
	$user = User::find(1);
	foreach($user->posts as $post){
		echo $post->title;
	}
});

//Many to Many Relationship
Route::get('/user/{id}/role', function($id){
	$user = User::find($id)->roles()->orderBy('id', 'desc')->get();
	return $user;
	//foreach($user->roles as $role){
		//echo $role->name;
	//}
});

Route::get('user/{id}/pivot', function($id){
	$user = User::find($id);
	foreach($user->roles as $role){
		echo $role->pivot->created_at;
	}
});

//has many through relation

Route::get('/user/country/{id}', function($id){
	$country = Country::find($id);
	foreach($country->posts as $post){
		return $post->title;
	}
});

//Polymorphic Relations
Route::get('/post/{id}/photos', function($id){
	$post = Post::find($id);
	foreach($post->photos as $photo){
		return $photo->path;
	}
});

Route::get('/user/{id}/photos', function($id){
	$user = User::find($id);
	foreach($user->photos as $photo){
		return $photo->path;
	}
});

//Polymorphic Relation the invers
Route::get('photo/{id}/post', function($id){
	$photo = Photo::findOrFail($id);
	return $photo->imageable;
	
});

//Polymorphic Many To Many
Route::get('/post/tag/{id}', function($id){
	$post = Post::find($id);
	foreach($post->tags as $tag){
		echo $tag->name;
	}
});




