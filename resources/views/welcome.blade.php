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
      <a href="/login">Se connecter</a>
      <a href="/signup">Créer un compte</a>
    @endguest

    <main>
      <ul>
        @foreach($animes as $anime)
          <li>
            {{ $anime->title }}
            <img alt="" src="/covers/{{ $anime->cover }}" />
            <a href="/anime/{{ $anime->id }}">Voir</a>
          </li>
        @endforeach
      </ul>
    </main>
  </body>
</html>
