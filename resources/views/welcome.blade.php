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

    <main>
      <ul>
        @foreach($animes as $anime)
          <li>
            {{ $anime->title }}
            <img alt="" src="/covers/{{ $anime->cover }}" />
          </li>
        @endforeach
      </ul>
    </main>
  </body>
</html>
