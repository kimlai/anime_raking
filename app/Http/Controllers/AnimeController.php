<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

/*
 * Cette classe s'occupe de "gérer" toutes les requêtes qui
 * concernent les animes.
 * gérer =
 *   - valider les données envoyées dans la requête HTTP (si il y en a)
 *   - utiliser le modèle pour manipuler les données de la base de donnée
 *   - utiliser la vue pour générer du HTML (ou rediriger le navigateur vers une nouvelle page)
 *   - renvoyer ce HTML dans la réponse HTTP qui sera envoyée au navigateur
 */
class AnimeController
{
  public function showAll()
  {
    // modèle (pour l'instant le modèle n'est pas dans un module à part)
    $animes = DB::select("SELECT * FROM animes");
    // vue
    return view('welcome', ["animes" => $animes]);
  }

  public function showOne($id)
  {
    // modèle (pour l'instant le modèle n'est pas dans un module à part)
    $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
    // vue
    return view('anime', ["anime" => $anime]);
  }
}
