<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RainbowEmber</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{content-for "head"}}

    <link rel="stylesheet" href="{{rootURL}}assets/vendor.css">
    <link rel="stylesheet" href="{{rootURL}}assets/rainbow-ember.css">

    {{content-for "head-footer"}}
  </head>
  <body>
    {{content-for "body"}}

    <script src="{{rootURL}}assets/vendor.js"></script>
    <script src="{{rootURL}}assets/rainbow-ember.js"></script>

    {{content-for "body-footer"}}
  </body>
</html>