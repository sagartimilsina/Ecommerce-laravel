<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                notify()->success('Welcome Admin, You are logged in successfully');
                return redirect()->route('admin_dashboard');
            } elseif (Auth::user()->role === 'user') {
                notify()->success('Welcome User, You are logged in successfully');
                return redirect()->route('user_dashboard');
            } else {
                notify()->error('These credentials do not match our records');
                return redirect()->route('login');
            }
        }
        return redirect()->route('login')->with([
            notify()->error('These credentials do not match our records'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
