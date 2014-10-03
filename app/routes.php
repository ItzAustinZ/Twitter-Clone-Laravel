<?php
//tweets

//index


// Route::get('/sample', function(){
// 	// $tweets = User::find(1)->tweets()->orderBy('id', 'DESC')->get();
// 	// //$tweets = User::where('nickname', 'Jed')->tweets;
// 	// //$tweets = User::where('nickname', '=', 'Jed')->tweets()->get();
	 
// 	//  foreach ($tweets as $tweet) {
// 	//  	echo $tweet->tweet, '</br>';
// 	//  }


// 	$user = User::where('nickname', '=', 'Jed')->orderBy('id', 'DESC')->first();

// 	return $user->tweets;

// 	// foreach ($user->tweets as $tweet) {
// 	// 	echo $tweet->tweet, '</br>';
// 	// }
// });


Route::get('/', 'TweetController@index');
Route::resource('tweet', 'TweetController');

// Route::get('/', function(){
// 	return View::make('tweets.index');
// });

//Session Controller | Login, Logout
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::resource('session', 'SessionController');

//User Controller | Registration
Route::get('signup', 'UserController@create');
Route::resource('users', 'UserController');


//Profile Controller
Route::get('users/profiles/{nickname}', 'ProfileController@show');




//Follower Controller
Route::get('follow/{nickname}', 'FollowerController@store');



