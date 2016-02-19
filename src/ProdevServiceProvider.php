<?php

namespace HiroKws\Prodev;

use Illuminate\Support\ServiceProvider;

class ProdevServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }

    public function register()
    {
        // Add extra service provider when 'local' environment.
        if( $this->app->environment() == 'local' )
        {
            foreach( $this->app->config->get( 'app.dev-providers' ) as $providerName )
            {
                $this->app->register( $providerName );
            }
        }

        // Add extra aliases.
        foreach( $this->app->config->get( 'app.dev-aliases' ) as $alias => $className )
        {
            if( $this->app->environment() == 'local' )
            {
                $$this->app->alias( $alias, $className );
            }
            else
            {
                // Register stab class when it is not in local environment.
                $this->app->alias( $alias, MethodCallHandler::class );
            }
        }
    }

}