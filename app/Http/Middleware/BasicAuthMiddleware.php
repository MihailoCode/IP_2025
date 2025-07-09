<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Korisnik;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authHeader = $request->header('Authorization');
        # Basic username:lozinka <-- enkodira se u Base64
        # Basic iqanfiasfa0bGVDS==

        if (!$authHeader || !str_starts_with($authHeader, 'Basic ')) {
            return response('Access Forbidden, wrong or missing Authorization header', 403);
        }

        $imeILozinka = substr($authHeader, 6);

        $dekodirano = base64_decode($imeILozinka);
        if (!$dekodirano || !str_contains($dekodirano, ':')) {
            return response('Access Forbidden, invalid Basic auth token', 403);
        }

        [$ime, $lozinkaPlain] = explode(':', $dekodirano, 2);

        $salt = env('BASIC_AUTH_SALT');
        $lozinkaHash = hash('sha256', $lozinkaPlain . $salt);
        $korisnik = Korisnik::where('ime', $ime)
            ->where('lozinka', $lozinkaHash)
            ->first();
        
        if (!$korisnik) {
            return response('Access Forbidden, wrong credentials', 403);
        }

        return $next($request);
    }
}
