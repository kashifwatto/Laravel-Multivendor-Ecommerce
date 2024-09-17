<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has("uid")) {
            return $next($request);
        } else {
            // Check if the current route is not the login route to avoid redirection loop
            if ($request->routeIs('/')) {
                return $next($request);
            }
            return redirect('/');
        }

    }
    // LoginController.php

protected function authenticated(Request $request, $user)
{
    if ($user->status === 'hold') {
        Auth::logout();
        return redirect('/login')->withErrors(['Your account is currently on hold.']);
    }

    // Proceed with normal login flow
}

}
