<?php namespace Thrive\SpagesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Spages\SpagesPagesEntryModel;
use Illuminate\Routing\Router;

//
use Thrive\SpagesModule\Console\Dump;
use Thrive\SpagesModule\Page\Command\CreateStaticPageRoutes;
use Thrive\SpagesModule\Listener\RefreshPagesModule;

use Thrive\SpagesModule\Page\Contract\PageRepositoryInterface;
use Thrive\SpagesModule\Page\PageModel;
use Thrive\SpagesModule\Page\PageRepository;


class SpagesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [
        Dump::class,
    ];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
       
        // Public routes are dynamic
        //'spages/{id}'                  => 'Thrive\SpagesModule\Http\Controller\PagesController@page',

        //Pages
        'admin/spages/'           => 'Thrive\SpagesModule\Http\Controller\Admin\PagesController@index',
        'admin/spages/pages'           => 'Thrive\SpagesModule\Http\Controller\Admin\PagesController@index',
        'admin/spages/pages/create'    => 'Thrive\SpagesModule\Http\Controller\Admin\PagesController@create',
        'admin/spages/pages/edit/{id}' => 'Thrive\SpagesModule\Http\Controller\Admin\PagesController@edit',

    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        //Thrive\SpagesModule\Http\Middleware\ExampleMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Thrive\SpagesModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        SystemIsRefreshing::class => [
            RefreshPagesModule::class,
        ],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Thrive\SpagesModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        SpagesPagesEntryModel::class => PageModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        PageRepositoryInterface::class => PageRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        if (!file_exists($routes = app_storage_path('spages/routes.php'))) 
        {
            dispatch_now(new CreateStaticPageRoutes());
        }

        require $routes;        
    }

}

