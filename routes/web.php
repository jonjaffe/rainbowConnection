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

function formatJSON($data, $type) {
  $json = array('data' => array());
  foreach($data as $dataItem):
    array_push($json['data'], array( 'type' => $type,
                                   'id' => $dataItem->id,
                                   'attributes' => $dataItem));
  endforeach;
  return $json;
}

Route::get('/testdata',  function(Illuminate\Http\Request $request){
  //pull userCount from queryString
  $userCount = (int)$request->query('userCount');
  Artisan::call('db:seedCustom', ['userCount' => $userCount]);
});

//fetches all Users from the users table and returns each user in JSON
Route::get('/users', function () {
    $users = App\User::all();
    //grab all friends from friendship table
    foreach($users as $user):
      $friends = $user->friends;
    endforeach;
    return formatJSON($users, 'users');
});

// Route::get('/users', function () {
//     $users = DB::table('users')->get();
//     foreach($users as $user):
//       $friends = $user->friends;
//     endforeach;
//     return formatJSON($users, 'users');
//     // return array('data' => array('type' => 'users', 'id' => 1, 'attributes' => $users));
//     // return view('welcome', compact('tasks'));
// });
// // Route::get('/', 'UserController@index');


Route::get('/{userId}', function($id) {
  $user = DB::table('users')->find($id);
  dd($user);
  return $user;
});

Route::patch('/{userId}/{color}', function($userId, $color){
  $user = DB::table('users')->find($userId);
  $user->favoritecolor = $color;
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
