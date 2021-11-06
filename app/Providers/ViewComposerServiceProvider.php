<?php

namespace App\Providers;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer( 'auth.register', function ( $view ) {
            $roleRepository = $this->app->make( RoleRepositoryInterface::class );

            $roles = $roleRepository->getRolesView();

            $view->with( 'roles', $roles );
        } );
    }
}
