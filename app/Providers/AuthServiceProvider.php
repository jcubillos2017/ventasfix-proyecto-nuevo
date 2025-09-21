<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Cart;
use App\Models\Product;
use App\Policies\ProductPolicy;
use App\Policies\CartPolicy;
use App\Models\Client;
use App\Policies\ClientPolicy;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Cart::class => CartPolicy::class,
        Product::class => ProductPolicy::class,
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // En Laravel 10/11 no necesitas llamar registerPolicies() manualmente.
        // Si tu proyecto es más antiguo, puedes descomentar:
        // $this->registerPolicies();
    }
}
