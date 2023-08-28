<?php

namespace Hasnayeen\BladeSsg\Http\Middleware;

use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @param  array<string>  $guards
     */
    protected function authenticate($request, array $guards): void
    {
        User::exists() || User::create([
            'name' => 'Admin',
            'email' => config('blade-ssg.user.email'),
            'password' => bcrypt(config('blade-ssg.user.password')),
        ]);

        Filament::auth()->attempt(
            [
                'email' => config('blade-ssg.user.email'),
                'password' => config('blade-ssg.user.password'),
            ],
            true,
        );

        session()->regenerate();
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
