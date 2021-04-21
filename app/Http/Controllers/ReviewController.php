<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/*
 * Cette classe s'occupe de "gérer" toutes les requêtes qui
 * concernent les critiques.
 * gérer =
 *   - valider les données envoyées dans la requête HTTP (si il y en a)
 *   - utiliser le modèle pour manipuler les données de la base de donnée
 *   - utiliser la vue pour générer du HTML (ou rediriger le navigateur vers une nouvelle page)
 *   - renvoyer ce HTML dans la réponse HTTP qui sera envoyée au navigateur
 */
class ReviewController
{
  public function newReview()
  {
    // si l'utilisateur n'est pas connecté, on le redirige vers la page de login
    // on ne fait pas un `view("login")` mais bien une redirection pour changer l'url
    if (!Auth::check()) {
      return redirect('/login');
    }
    // vue
    return view('new_review');
  }
}
