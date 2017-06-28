<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function updateColor($color) {
      $this->update("favorite_color", $color);
    };

    public function friends()
  	{
  		return $this->belongsToMany('User', 'friendships', 'user_id', 'friend_id');
  	};

    public function removeFriend(User $user)
  	{
  		$this->friends()->detach($user->id);
  	};
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
