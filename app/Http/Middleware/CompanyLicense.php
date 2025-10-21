<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyLicense{

    public function handle(Request $request, Closure $next): Response{
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Usuário não autorizado'], 401);
        }

        if (!$user->company) {
            return response()->json(['error' => 'Usuário não está associado a nenhuma empresa'], 403);
        }

        if (!$user->company->license_active) {
            return response()->json(['error' => 'A licença da empresa expirou'], 403);
        }

        return $next($request);
    }
}