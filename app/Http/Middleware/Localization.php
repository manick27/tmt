<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class Localization
{
    public function __construct(Application $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // On récupère la langue de la session ou la langue par défaut
        $lang = session()->get('locale', config('app.locale'));

        // On vérifie que la langue est valide, sinon on renvoie une erreur 400
        if (! in_array($lang, ['en', 'fr'])) {
            abort(400);
        }

        // On modifie la langue active avec la méthode App::setLocale()
        $this->app->setLocale($lang);

        return $next($request);
    }
}
