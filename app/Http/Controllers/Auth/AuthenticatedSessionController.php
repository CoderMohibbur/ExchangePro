<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('dashboard'));
    // }
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user (this will throw an exception if authentication fails)
        $request->authenticate();

        // Check if the authenticated user can log in
        $user = auth()->user(); // Get the currently authenticated user

        if ($user && $user->can_login == 1) {
            // Regenerate session to avoid session fixation attacks
            $request->session()->regenerate();

            // Redirect to the intended page or dashboard
            return redirect()->intended(route('dashboard'));
        }

        // If login fails due to can_login == 0, log them out and clear the session
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->withErrors([
            'email' => 'Your account is not allowed to log in.'
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
