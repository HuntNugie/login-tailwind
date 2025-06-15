<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  @yield("auth")

</body>
</html>
