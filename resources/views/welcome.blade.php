<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime ranking</title>
  </head>
  <body>
    @auth
      {{ Auth::user()->username }}
    @endauth
    @guest
      Guest
    @endguest
  </body>
</html>
