<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
 * Cette classe s'occupe de "gérer" toutes les requêtes qui concernent
 * l'authentification des utilisateurs (création de compte et connexion).
 *
 * gérer =
 *   - valider les données envoyées dans la requête HTTP (si il y en a)
 *   - utiliser le modèle pour manipuler les données de la base de donnée
 *   - utiliser la vue pour générer du HTML (ou rediriger le navigateur vers une nouvelle page)
 *   - renvoyer ce HTML dans la réponse HTTP qui sera envoyée au navigateur
 */
class AuthenticationController
{
  public function loginForm()
  {
    // vue
    return view('login');
  }

  public function attemptLogin(Request $request)
  {
    // validation des données envoyées dans la requête
    $validated = $request->validate([
      "username" => "required",
      "password" => "required",
    ]);
    // on utilise une fonction Laravel qui va faire une requête SQL pour récupérer
    // l'utilisateur dans la base de donnée, puis comparer le mot de passe enregistré
    // avec le mot de passe envoyé (en utilisant `password_verify`).
    // Si le mot de passe est correct, la session sera mise à jour.
    if (Auth::attempt($validated)) {
      return redirect()->intended('/');
    }
    // si l'authentification échoue, on redirige l'utilisateur sur la page de login
    // en mettant un message d'erreur dans la session, qui sera affiché par la vue
    return back()->withErrors([
      'username' => 'The provided credentials do not match our records.',
    ]);
  }

  public function signupForm()
  {
    return view('signup');
  }

  public function register(Request $request)
  {
    // validation des données envoyée dans la requête HTTP
    $validated = $request->validate([
      "username" => "required",
      "password" => "required",
      "password_confirmation" => "required|same:password"
    ]);
    // modèle : création d'un nouvel utilisateur et insertion dans la base de données
    $user = new User();
    $user->username = $validated["username"];
    $user->password = Hash::make($validated["password"]);
    $user->save();
    // mise à jour la session pour connecter le nouvel utilisateur
    Auth::login($user);

    return redirect('/');
  }

  public function signOut(Request $request) {
    // suppression des infos de connexion de la session
    Auth::logout();
    // invalidation de la session pour qu'elle ne puisse plus être utilisée
    $request->session()->invalidate();
    // on génère un nouvel id de session pour être sûr qu'elle ne puisse plus être
    // utilisée (ceinture et bretelles)
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
