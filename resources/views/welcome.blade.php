<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rainbow Yo</title>
  </head>
  <body>
    <ul>
      @foreach ($users as $user)
        <li>
          {{$user}}
        </li>
      @endforeach
    </ul>
  </body>
</html>
