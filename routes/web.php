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

Route::get('/', function () {
    $users = DB::table('users')->get();
    return $users;
    // return view('welcome', compact('tasks'));
});

Route::get('/{userId}', function($id) {
  $user = DB::table('users')->find($id);
  dd($user);
  return $user;
});