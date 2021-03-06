<?php

namespace HiroKws\Prodev;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

/**
 * Laravel service provider to handle additional providers/aliases.
 *
 * Register `dev-providers' and 'dev-alias' in app.php configuration file.
 * Both array to be effective when Laravel environment is 'local'.
 *
 * Sometime remain no needed code in production environment, like debug/profile code.
 * For example :
 *     <code>Debugbar::info($object);</code>
 *
 * To ignore this kind of alias, asign dummy stab to do nothing when called the method.
 */
class ProdevServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Add extra service provider when 'local' environment.
        $extraProviders = $this->app->config->get('app.dev-providers');

        if ($this->app->environment() === 'local' && !empty($extraProviders)) {
            foreach ($extraProviders as $providerName) {
                $this->app->register($providerName);
            }
        }

        // Add extra aliases.
        $extraAliases = $this->app->config->get('app.dev-aliases');

        // Applicaton's alias method don't work. So use alias loader.
        $aliasLoader = AliasLoader::getInstance();

        if (!empty($extraAliases)) {
            foreach ($extraAliases as $alias => $className) {
                if ($this->app->environment() === 'local') {
                    $aliasLoader->alias($alias,$className );
                } else {
                    // Register stab class when it is not in local environment.
                    $aliasLoader->alias($alias, MethodCallHandler::class);
                }
            }
        }
    }

    public function register()
    {
    }
}
