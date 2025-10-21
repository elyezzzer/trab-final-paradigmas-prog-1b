<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    public function handle(Request $request, Closure $next, ...$permissions): Response{
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Usuário não autorizado'], 401);
        }

        if (!$user->hasPermission($permissions)) {
            return response()->json([
                'error' => 'Você não possui as permissões necessárias para acessar este recurso'
            ], 403);
        }

        return $next($request);
    }
}