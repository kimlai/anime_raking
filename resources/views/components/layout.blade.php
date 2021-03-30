<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Anime Ranking' }}</title>
    <link rel="stylesheet" href="/app.css" />
  </head>
  <body>
    <header>
      <a class="logo" href="/">Anime Ranking</a>
      <nav>
        @auth
          {{ Auth::user()->username }}
          <form action="/signout" method="POST">
            @csrf
            <button>Se déconnecter</button>
          </form>
        @endauth
        @guest
          <a href="/login">Se connecter</a>
          <a href="/signup">Créer un compte</a>
        @endguest
      </nav>
    </header>
    <main>
      {{ $slot }}
    </main>
  </body>
</html>
