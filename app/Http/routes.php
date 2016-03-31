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

Route::group(['middleware' => ['web']], function () {

   Route::get('/', [
        'uses' => '\AStateForum\Http\Controllers\HomeController@index',
        'as'   => 'home'
    ]);

    Route::get('/alert', function() {
        return redirect()->route('home')->with('info', 'You have signed up!');
    });

    Route::get('/signup', [
    	'uses' => '\AStateForum\Http\Controllers\AuthController@getSignUp',
    	'as' => 'auth.signup',
        'middleware' => ['guest'],
    	]);

    Route::post('/signup', [
    	'uses' => '\AStateForum\Http\Controllers\AuthController@postSignUp',
        'middleware' => ['guest'],
    	
    	]);

    Route::get('/signin', [
        'uses' => '\AStateForum\Http\Controllers\AuthController@getSignin',
        'as' => 'auth.signin',
        'middleware' => ['guest'],
        ]);

    Route::post('/signin', [
        'uses' => '\AStateForum\Http\Controllers\AuthController@postSignin',
        'middleware' => ['guest'],
        ]);

     Route::get('/signout', [
        'uses' => '\AStateForum\Http\Controllers\AuthController@getSignout',
        'as' => 'auth.signout',
        ]);

     Route::get('/search', [
        'uses' =>  '\AStateForum\Http\Controllers\SearchController@getResults',
        'as' => 'search.results',
        ]);

     Route::get('/user/{username}', [
        'uses' =>  '\AStateForum\Http\Controllers\ProfileController@getProfile',
        'as' => 'profile.index',
        ]);

     Route::get('/profile/edit', [
        'uses' =>  '\AStateForum\Http\Controllers\ProfileController@getEdit',
        'as' => 'profile.edit',
        'middleware' => ['auth'],
        ]);

     Route::post('/profile/edit', [
        'uses' =>  '\AStateForum\Http\Controllers\ProfileController@postEdit',
        'middleware' => ['auth'],
        ]);

     Route::get('/post', [
        'uses' =>  '\AStateForum\Http\Controllers\ForumController@getPost',
        'as' => 'pages.question',
        'middleware' => ['auth'],
        ]);

      Route::post('/post', [
        'uses' =>  '\AStateForum\Http\Controllers\ForumController@postQuestion',
        'middleware' => ['auth'],
        ]);

       Route::get('/forumpost', [
        'uses' =>  '\AStateForum\Http\Controllers\ForumController@getForumViewPost',
        'as' => 'pages.forumViewPost',
        'middleware' => ['auth'],
        ]);

       Route::post('/forum/{postId}/reply', [
        'uses' =>  '\AStateForum\Http\Controllers\ForumController@postComment',
        'as' => 'status.reply',
        'middleware' => ['auth'],
        ]);

       Route::get('/forum', [
        'uses' =>  '\AStateForum\Http\Controllers\ForumController@getViewPost',
        'as' => 'pages.viewPost',
        'middleware' => ['guest'],
        ]);

});
