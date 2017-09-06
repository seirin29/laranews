<?php

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

Route::get('/insert', function(){
	DB::insert("insert into posts(title, content) values(?, ?)",
				['PHP with Laravel', 'Laravel is the Best Thing that happen to PHP']);
				
});

Route::get('/read', function(){
	$results = DB::select("select * from posts where id = ?", [1]);
	//foreach($results as $posts){
		//return $posts->title;
	//}
	return $results;
});




