<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users', function () {
    $users = DB::table('users')->get();
    return $users;
    // return view('welcome', compact('tasks'));
});
// Route::get('/', 'UserController@index');


Route::get('/{userId}', function($id) {
  $user = DB::table('users')->find($id);
  dd($user);
  return $user;
});

Route::patch('/{userId}/{color}', function($userId, $color){
  $user = DB::table('users')->find($userId);
  $user->favorite_color = $color;
  $user->save();
  // $user = DB::table('users')->find($userId);
  // $user->updateColor($color);
  return $user;
});

Route::delete('/{userId}/{friendId}', function($userId, $friendId){
  $user = DB::table('users')->find($userId);
  $user->removeFriend($friendId);
  return $user;
});

Route::get('{data?}', function()
{
    return View::make('app');
})->where('data', '.*');
