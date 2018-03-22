<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div id="app">
      <main-app></main-app>
  </div>
  <script src="{{ 'js/jquery.min.js' }}"></script>
  <script src="{{ 'js/bootstrap.min.js' }}"></script>
  <script src="{{ 'js/vue.min.js' }}"></script>
  <script src="{{ 'js/vue-router.min.js' }}"></script>
  <script src="{{ 'js/app.js' }}"></script>
</body>
</html>