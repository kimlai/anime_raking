<form action="/login" method="POST">
  @csrf
  <label for="username">Nom d'utilisateur</label>
  <input id="username" name="username" value="{{ old('username') }}" required />
  @error('username')
    <p class="error">{{ $message }}</p>
  @enderror
  <label for="password">Mot de passe</label>
  <input id="password" name="password" type="password"/>
  @error('password')
    <p class="error">{{ $message }}</p>
  @enderror
  <button>Se connecter</button>

  <div>
    Vous n'avez pas encore de compte ? <a href="/signup">Créez vous un compte</a>
  </div>
</form>
