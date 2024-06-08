<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Encryption\DecryptException;

class DecryptId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->route('id')) {
            try {
                $decryptedId = Crypt::decrypt($request->route('id'));
                $request->route()->setParameter('id', $decryptedId);
            } catch (DecryptException $e) {
                return abort(404); // atau respon yang sesuai jika dekripsi gagal
            }
        }

        return $next($request);
    }
}
