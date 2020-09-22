<?php

namespace Stalker;

use App;
use Config;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Log;

use Muleta\Traits\Providers\ConsoleTools;

use Route;
use Stalker\Facades\Stalker as StalkerFacade;
use Stalker\Services\FileService;

use Stalker\Services\StalkerService;

class StalkerProvider extends ServiceProvider
{
    use ConsoleTools;

    public $packageName = 'stalker';
    const pathVendor = 'sierratecnologia/stalker';

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
        [
            'text' => 'Painel',
            'icon' => 'fas fa-fw fa-search',
            'icon_color' => "blue",
            'label_color' => "success",
            'section' => "painel",
            'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
        ],
        'Painel' => [
            // 'Stalker' => [
                [
                    'text'        => 'Albums',
                    'route'       => 'stalker.medias', // @todo
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section'       => 'painel',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Biblioteca',
                    'route'       => 'stalker.medias',
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section'       => 'painel',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                // ],
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
        $this->loadRoutesForRiCa(__DIR__.'/../routes');
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/stalker.php'), 'sitec.stalker');
        $this->mergeConfigFrom($this->getPublishesPath('config/encode.php'), 'encode');
        $this->mergeConfigFrom($this->getPublishesPath('config/image.php'), 'image');
        $this->mergeConfigFrom($this->getPublishesPath('config/imagecache.php'), 'imagecache');
        $this->mergeConfigFrom($this->getPublishesPath('config/media-library.php'), 'media-library');
        $this->mergeConfigFrom($this->getPublishesPath('config/messenger.php'), 'messenger');
        $this->mergeConfigFrom($this->getPublishesPath('config/mime.php'), 'mime');
        

        $this->setProviders();
        $this->routes();

        $this->app->singleton(
            'stalker',
            function () {
                return new Stalker();
            }
        );

        $this->app->bind(
            'FileService',
            function ($app) {
                return new FileService();
            }
        );
        
        // Events
        $this->app['events']->listen(
            'eloquent.saving:*',
            '\Stalker\Observers\Encoding@onSaving'
        );
        $this->app['events']->listen(
            'eloquent.deleted:*',
            '\Stalker\Observers\Encoding@onDeleted'
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
            StalkerService::class,
            function ($app) {
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
            $this->getPublishesPath('config/encode.php') => config_path('encode.php'),
            $this->getPublishesPath('config/image.php') => config_path('image.php'),
            $this->getPublishesPath('config/imagecache.php') => config_path('imagecache.php'),
            $this->getPublishesPath('config/media-library.php') => config_path('media-library.php'),
            $this->getPublishesPath('config/messenger.php') => config_path('messenger.php'),
            $this->getPublishesPath('config/mime.php') => config_path('mime.php'),
            ],
            ['config',  'sitec', 'sitec-config']
        );

        // // Publish stalker css and js to public directory
        // $this->publishes([
        //     $this->getDistPath('stalker') => public_path('assets/stalker')
        // ], ['public',  'sitec', 'sitec-public']);

        $this->loadViews();
        $this->loadTranslations();


        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    private function loadViews()
    {
        // View namespace
        $viewsPath = $this->getResourcesPath('views');
        $this->loadViewsFrom($viewsPath, 'stalker');
        $this->publishes(
            [
            $viewsPath => base_path('resources/views/vendor/stalker'),
            ],
            ['views',  'sitec', 'sitec-views', 'stalker']
        );
    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang/vendor/stalker')
            ],
            ['lang',  'sitec', 'stalker']
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
            'logging.channels.sitec-stalker',
            [
            'driver' => 'single',
            'path' => storage_path('logs/sitec-stalker.log'),
            'level' => env('APP_LOG_LEVEL', 'debug'),
            ]
        );
    }
}
