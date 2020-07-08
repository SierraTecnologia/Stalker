<?php

namespace Artista;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Artista\Services\ArtistaService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

use Log;
use App;
use Config;
use Route;
use Illuminate\Routing\Router;

use Support\Traits\Providers\ConsoleTools;

use Artista\Facades\Artista as ArtistaFacade;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Artista\Services\Midia\FileService;

class ArtistaProvider extends ServiceProvider
{
    use ConsoleTools;

    public static $aliasProviders = [
        'Artista' => \Artista\Facades\Artista::class,
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

        
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Painel' => [
            'Artista' => [
                [
                    'text'        => 'Artista Midias',
                    'route'       => 'artista.medias',
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
         * Artista Routes
         */
        Route::group(
            [
                'namespace' => '\Artista\Http\Controllers',
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
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/artista.php'), 'sitec.artista');
        $this->mergeConfigFrom($this->getPublishesPath('config/mime.php'), 'mime');
        

        $this->setProviders();
        $this->routes();



        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->singleton(
            'artista', function () {
                return new Artista();
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
         * Singleton Artista
         */
        $this->app->singleton(
            ArtistaService::class, function ($app) {
                Log::channel('sitec-artista')->info('Singleton Artista');
                return new ArtistaService(\Illuminate\Support\Facades\Config::get('sitec.artista'));
            }
        );

        // Register commands
        $this->registerCommandFolders(
            [
            base_path('vendor/sierratecnologia/artista/src/Console/Commands') => '\Artista\Console\Commands',
            ]
        );

        // /**
        //  * Helpers
        //  */
        // Aqui noa funciona
        // if (!function_exists('artista_asset')) {
        //     function artista_asset($path, $secure = null)
        //     {
        //         return route('artista.assets').'?path='.urlencode($path);
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
            'artista',
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

        // // Publish artista css and js to public directory
        // $this->publishes([
        //     $this->getDistPath('artista') => public_path('assets/artista')
        // ], ['public',  'sitec', 'sitec-public']);

        $this->loadViews();
        $this->loadTranslations();

    }

    private function loadViews()
    {
        // View namespace
        $viewsPath = $this->getResourcesPath('views');
        $this->loadViewsFrom($viewsPath, 'artista');
        $this->publishes(
            [
            $viewsPath => base_path('resources/views/vendor/artista'),
            ], ['views',  'sitec', 'sitec-views']
        );

    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang/vendor/artista')
            ], ['lang',  'sitec', 'sitec-lang', 'translations']
        );

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'artista');
    }


    /**
     * 
     */
    private function loadLogger()
    {
        Config::set(
            'logging.channels.sitec-artista', [
            'driver' => 'single',
            'path' => storage_path('logs/sitec-artista.log'),
            'level' => env('APP_LOG_LEVEL', 'debug'),
            ]
        );
    }

}
