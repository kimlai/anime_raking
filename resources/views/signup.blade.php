<form action="/signup" method="POST">
  @csrf
  <label for="username">Nom d'utilisateur</label>
  <input id="username" name="username" value="{{ old('username') }}" required />
  @error('username')
    <p class="error">{{ $message }}</p>
  @enderror

  <label for="password">Mot de passe</label>
  <input id="password" name="password" type="password" required />
  @error('password')
    <p class="error">{{ $message }}</p>
  @enderror

  <label for="password_confirmation">Confirmez votre mot de passe</label>
  <input id="password_confirmation" name="password_confirmation" type="password" required />
  @error('password_confirmation')
    <p class="error">{{ $message }}</p>
  @enderror

  <button>Créer un compte</button>
</form>
