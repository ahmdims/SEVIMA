<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $messages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a valid string.',
        ];

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Log::info('User role: ' . $user->role);

            Auth::login($user);

            $user->save();

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended(route('admin.dashboard.index', absolute: false));

                case 'user':
                    return redirect()->intended(route('app.dashboard.index', absolute: false));

                default:
                    return redirect()->route('login');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $user->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
