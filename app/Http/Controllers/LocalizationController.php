<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    // Cette méthode prend en paramètre la langue choisie par l'utilisateur
    public function setLang(string $lang)
    {
        // On vérifie que la langue est valide, sinon on renvoie une erreur 400
        if (! in_array($lang, ['en', 'fr'])) {
            abort(400);
        }

        // On modifie la langue active avec la méthode App::setLocale()
        App::setLocale($lang);

        // On stocke la langue choisie dans la session de l'utilisateur
        session()->put('locale', $lang);
        // dd($lang);

        // On redirige l'utilisateur vers la page précédente ou vers l'accueil
        return redirect()->back() ?? redirect('/');
    }
}
