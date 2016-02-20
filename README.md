# Prodev

Add extra Laravel service providers and class aliases at 'local' environment.
This Component name came from 'prod(uctin)-dev(elopment)'.

__CAUTION, now in development__

## Installation

On your terminal, type following command.

~~~
composer require hirokws/prodec
~~~

Or, register in composer.json file.

~~~
...
    require {
        ...
        "hirokws/prodev": "1.*"
    }
...
~~~

## Usage

First of all, add a service provider of this package into 'providers' array in app.php configuratin file.

~~~
    'providers' => [
        ....
        'HiroKws\Prodev\ProdevServiceProvider',
    ],
~~~

Then next, register your addtional providers when use at local environment in app.php file. Like following :

~~~
...
    'dev-providers' => [
        Barryvdh\Debugbar\ServiceProvider::class,
    ],
...
~~~

If needed, register additnal class aliases. For example :

~~~
...
    'dev-aliases' => [
        'Debugbar' => Barryvdh\Debugbar\Facade::class,
    ]
~~~

At 'local' environment, aliases defined in 'dev-aliases' array, are effective.
In other environments, defined aliases will asign to dummy stab class to do nothing when any method called.

This is simple package. See also check codes.
