<?php

namespace Stalker;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Stalker\Services\StalkerService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

use Log;
use App;
use Config;
use Route;
use Illuminate\Routing\Router;

use Support\Traits\Providers\ConsoleTools;

use Stalker\Facades\Stalker as StalkerFacade;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Stalker\Services\Midia\FileService;

class StalkerProvider extends ServiceProvider
{
    use ConsoleTools;

    public static $aliasProviders = [
        'Stalker' => \Stalker\Facades\Stalker::class,
        'FileService' => FileService::class,
    ];

    public static $providers = [

        \Tracking\TrackingProvider::class,

        /**
         * Externos
         */
        // \CipeMotion\Medialibrary\ServiceProvider::class,
        \SierraTecnologia\Crypto\CryptoProvider::class,
        \Intervention\Image\ImageServiceProvider::class,
        \Spatie\MediaLibrary\MediaLibraryServiceProvider::class,

        \CipeMotion\Medialibrary\ServiceProvider::class,
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Painel' => [
            'Stalker' => [
                [
                    'text'        => 'Stalker Midias',
                    'route'       => 'stalker.medias',
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
            ],
        ],
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        
        // Register configs, migrations, etc
        $this->registerDirectories();

        // // COloquei no register pq nao tava reconhecendo as rotas para o adminlte
        // $this->app->booted(function () {
        //     $this->routes();
        // });

        $this->loadLogger();
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        /**
         * Stalker Routes
         */
        Route::group(
            [
                'namespace' => '\Stalker\Http\Controllers',
                'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.main'),
                'as' => 'rica.',
            ], function ($router) {
                include __DIR__.'/Routes/web.php';
            }
        );
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/medialibrary.php'), 'medialibrary');
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/stalker.php'), 'sitec.stalker');
        $this->mergeConfigFrom($this->getPublishesPath('config/mime.php'), 'mime');
        

        $this->setProviders();
        $this->routes();



        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->singleton(
            'stalker', function () {
                return new Stalker();
            }
        );

        $this->app->bind(
            'FileService', function ($app) {                                                                                                                                                                                                                      
                return new FileService();
            }
        );
        
        /*
        |--------------------------------------------------------------------------
        | Register the Utilities
        |--------------------------------------------------------------------------
        */
        /**
         * Singleton Stalker
         */
        $this->app->singleton(
            StalkerService::class, function ($app) {
                Log::channel('sitec-stalker')->info('Singleton Stalker');
                return new StalkerService(\Illuminate\Support\Facades\Config::get('sitec.stalker'));
            }
        );

        // Register commands
        $this->registerCommandFolders(
            [
            base_path('vendor/sierratecnologia/stalker/src/Console/Commands') => '\Stalker\Console\Commands',
            ]
        );

        // /**
        //  * Helpers
        //  */
        // Aqui noa funciona
        // if (!function_exists('stalker_asset')) {
        //     function stalker_asset($path, $secure = null)
        //     {
        //         return route('stalker.assets').'?path='.urlencode($path);
        //     }
        // }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'stalker',
        ];
    }

    /**
     * Register configs, migrations, etc
     *
     * @return void
     */
    public function registerDirectories()
    {
        // Publish config files
        $this->publishes(
            [
            // Paths
            $this->getPublishesPath('config/sitec') => config_path('sitec'),
            $this->getPublishesPath('config/medialibrary.php') => config_path('medialibrary.php'),
            $this->getPublishesPath('config/mime.php') => config_path('mime.php'),
            ], ['config',  'sitec', 'sitec-config']
        );

        // // Publish stalker css and js to public directory
        // $this->publishes([
        //     $this->getDistPath('stalker') => public_path('assets/stalker')
        // ], ['public',  'sitec', 'sitec-public']);

        $this->loadViews();
        $this->loadTranslations();

    }

    private function loadViews()
    {
        // View namespace
        $viewsPath = $this->getResourcesPath('views');
        $this->loadViewsFrom($viewsPath, 'stalker');
        $this->publishes(
            [
            $viewsPath => base_path('resources/views/vendor/stalker'),
            ], ['views',  'sitec', 'sitec-views']
        );

    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang/vendor/stalker')
            ], ['lang',  'sitec', 'sitec-lang', 'translations']
        );

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'stalker');
    }


    /**
     * 
     */
    private function loadLogger()
    {
        Config::set(
            'logging.channels.sitec-stalker', [
            'driver' => 'single',
            'path' => storage_path('logs/sitec-stalker.log'),
            'level' => env('APP_LOG_LEVEL', 'debug'),
            ]
        );
    }

}
