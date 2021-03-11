<?php

namespace Core\Providers;

use Core\Modules\ModuleServiceProvider;
use Core\Repositories\BrandRepository;
use Core\Repositories\CartRepository;
use Core\Repositories\CategoryRepository;
use Core\Repositories\ColorRepository;
use Core\Repositories\Contract\BrandRepositoryContract;
use Core\Repositories\Contract\CartRepositoryContract;
use Core\Repositories\Contract\CategoryRepositoryContract;
use Core\Repositories\Contract\ColorRepositoryContract;
use Core\Repositories\Contract\CustomerRepositoryContract;
use Core\Repositories\Contract\OrderDetailsRepositoryContract;
use Core\Repositories\Contract\OrderRepositoryContract;
use Core\Repositories\Contract\ProductRepositoryContract;
use Core\Repositories\Contract\RepositoryContract;
use Core\Repositories\Contract\SizeRepositoryContract;
use Core\Repositories\Contract\UserRepositoryContract;
use Core\Repositories\CustomerRepository;
use Core\Repositories\OrderDetailsRepository;
use Core\Repositories\OrderRepository;
use Core\Repositories\ProductRepository;
use Core\Repositories\Repository;
use Core\Repositories\SizeRepository;
use Core\Repositories\UserRepository;
use Core\Services\BrandService;
use Core\Services\CartService;
use Core\Services\CategoryService;
use Core\Services\ColorService;
use Core\Services\Contract\BrandServiceContract;
use Core\Services\Contract\CartServiceContract;
use Core\Services\Contract\CategoryServiceContract;
use Core\Services\Contract\ColorServiceContract;
use Core\Services\Contract\CustomerServiceContract;
use Core\Services\Contract\OrderDetailsServiceContract;
use Core\Services\Contract\OrderServiceContract;
use Core\Services\Contract\ProductServiceContract;
use Core\Services\Contract\RepositoryServiceContract;
use Core\Services\Contract\SizeServiceContract;
use Core\Services\Contract\UserServiceContract;
use Core\Services\CustomerService;
use Core\Services\OrderDetailsService;
use Core\Services\OrderService;
use Core\Services\ProductService;
use Core\Services\RepositoryService;
use Core\Services\SizeService;
use Core\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Events\RouteMatched;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->matched(function (RouteMatched $e) {
            $route = $e->route;
            if (!array_has($route->getAction(), 'guard')) {
                return;
            }
            $routeGuard = array_get($route->getAction(), 'guard');
            $this->app['auth']->resolveUsersUsing(function ($guard = null) use ($routeGuard) {
                return $this->app['auth']->guard($routeGuard)->user();
            });
            $this->app['auth']->setDefaultDriver($routeGuard);
        });;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ModuleServiceProvider::class);

        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserServiceContract::class, UserService::class);

        $this->app->bind(BrandRepositoryContract::class, BrandRepository::class);
        $this->app->bind(BrandServiceContract::class, BrandService::class);

        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceContract::class, CategoryService::class);

        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->bind(ProductServiceContract::class, ProductService::class);

        $this->app->bind(ColorRepositoryContract::class, ColorRepository::class);
        $this->app->bind(ColorServiceContract::class, ColorService::class);

        $this->app->bind(SizeRepositoryContract::class, SizeRepository::class);
        $this->app->bind(SizeServiceContract::class, SizeService::class);

        $this->app->bind(RepositoryContract::class, Repository::class);
        $this->app->bind(RepositoryServiceContract::class, RepositoryService::class);

        $this->app->bind(CustomerRepositoryContract::class, CustomerRepository::class);
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);

        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
        $this->app->bind(OrderServiceContract::class, OrderService::class);

        $this->app->bind(OrderDetailsRepositoryContract::class, OrderDetailsRepository::class);
        $this->app->bind(OrderDetailsServiceContract::class, OrderDetailsService::class);

        $this->app->bind(CartRepositoryContract::class, CartRepository::class);
        $this->app->bind(CartServiceContract::class, CartService::class);
    }
}
