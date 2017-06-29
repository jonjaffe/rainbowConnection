# Rainbow Connection
### Overview

Rainbow Connection is a very sophisticated social platform in which users list their favorite color. As is customary in American culture, sharing a common favorite color is enough to make people become best friends.

### Technical overview

Rainbow Connection is a demo fullstack app built with a PHP Laravel / MySQL backend and an Ember frontend. The project was created in two days with no previous experience with any of the aforementioned technologies.

### Features

#### Index page
![Index page](https://d26dzxoao6i3hh.cloudfront.net/items/21250600373s2j0z0K0U/Image%202017-06-29%20at%2010.21.29%20AM.png)

The index page shows all users, their favorite colors and links to their friends. Because what is more important in life than seeing your favorite color and your favorite people?

#### Show page
![Show page](https://d26dzxoao6i3hh.cloudfront.net/items/1C3c2p2R3I0Z0j3Z0307/Image%202017-06-29%20at%2010.35.36%20AM.png)

The show page shows the user, their favorite color (as if they could possibly forget) and their list of friends with the option to remove, in case they discover that their friend's predilection for colors is not like their own.

#### Test Endpoint

The objective was to build an endpoint where the database would be cleared and repopulated with a set number of users. Thanks to the PHP library Faker, I was able to generate `userCount` users with random names and email addresses. Though why Lyla Wisozk chose randi.oberbrunner@yahoo.com as her email we may never know.

```php

//rainbowBackend/database/seeds/UsersTableSeeder

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run($userCount = 20)
    {
      $faker = Faker\Factory::create();
      $colors = array('red','blue','yellow','green','purple','orange', 'yellow-green', 'blue-green', 'blue-violet', 'red-violet', 'red-orange', 'yellow-orange');
      DB::table('friends_users')->delete();
      DB::table('users')->delete();

      $user_array = array();
      for($i = 0; $i < $userCount; $i++){
        array_push($user_array,
                 ['name'=> $faker->name,
                  'email'=> $faker->unique()->email,
                  'favoritecolor' => $colors[rand(0,count($colors) - 1)],
                  'password'=>'']
          );
      }
      foreach($user_array as $user):
        User::create($user);
      endforeach;

      $new_users = User::all();
      foreach($new_users as $user):
          $friendCount = rand(0,50);
          $friends = array();

          for($i = 0; $i < $friendCount; $i++){
            $friend = $new_users[rand(0,count($new_users) - 1)];
            if(!array_key_exists($friend->id, $friends)){
              $user->addFriend($friend);
            }
            $friends[$friend->id] = true;
          }
      endforeach;
    }
}
```
#### Future Direction for the Project
- Implement ability to for a user to change their favorite color on the user show page, for those of the more vacillating persuasion.
- Implement infinite pagination. The ember-infinity library required some refactoring of the Laravel route to accept additional data, so this should be relatively straightforward.
