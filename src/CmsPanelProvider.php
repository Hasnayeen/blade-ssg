<?php

namespace Hasnayeen\BladeSsg;

use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Hasnayeen\BladeSsg\Http\Middleware\Authenticate;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CmsPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('cms')
            ->path('cms')
            ->colors([
                'primary' => [
                    '50' => '#f3f8f7',
                    '100' => '#e0edec',
                    '200' => '#c5dcdb',
                    '300' => '#8fbcbb',
                    '400' => '#6ca4a4',
                    '500' => '#518989',
                    '600' => '#467174',
                    '700' => '#3d5e61',
                    '800' => '#385052',
                    '900' => '#324447',
                    '950' => '#1e2c2e',
                ],
            ])
            ->discoverResources(in: __DIR__ . '/Filament/Resources', for: 'Hasnayeen\\BladeSsg\\Filament\\Resources')
            ->discoverPages(in: __DIR__ . '/Filament/Pages', for: 'Hasnayeen\\BladeSsg\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
