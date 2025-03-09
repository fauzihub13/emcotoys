<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Fortify::ignoreRoutes();
        Fortify::loginView(function (Request $request) {
            if ($request->getHost() === 'admin.' . env('APP_DOMAIN', 'emcotoys.test')) {
                return view('admin.pages.auth.login');
            }
            return view('user.pages.auth.login');
        });

        Fortify::registerView(function (Request $request) {
            if ($request->getHost() === 'admin.' . env('APP_DOMAIN', 'emcotoys.test')) {
                return abort(403, 'Registration is not allowed for admins');
            }
            return view('user.pages.auth.register');
        });

        Fortify::requestPasswordResetLinkView(function (Request $request) {
            if ($request->getHost() === 'admin.' . env('APP_DOMAIN', 'emcotoys.test')) {
                return view('admin.pages.auth.forgot-password');
            }
            return view('user.pages.auth.forgot-password');
        });

        Fortify::resetPasswordView(function (Request $request) {
            if ($request->getHost() === 'admin.' . env('APP_DOMAIN', 'emcotoys.test')) {
                return view('admin.pages.auth.reset-password', ['request' => $request]);
            }
            return view('user.pages.auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function (Request $request) {
            if ($request->getHost() === 'admin.' . env('APP_DOMAIN', 'emcotoys.test')) {
                return view('admin.pages.auth.verify-email');
            }
            return view('user.pages.auth.verify-email');
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Custom Auth View
        // Fortify::loginView(function () {
        //     return view('admin.pages.auth.login');
        // });

        // Fortify::registerView(function () {
        //     return view('admin.pages.auth.register');
        // });

        // Fortify::requestPasswordResetLinkView(function () {
        //     return view('admin.pages.auth.forgot-password');
        // });

        // Fortify::resetPasswordView(function (Request $request) {
        //     return view('admin.pages.auth.reset-password', ['request' => $request]);
        // });

        // Fortify::verifyEmailView(function () {
        //     return view('admin.pages.auth.verify-email');
        // });


    }
}
