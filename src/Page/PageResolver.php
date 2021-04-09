<?php namespace Thrive\SpagesModule\Page;

use Thrive\SpagesModule\Page\Contract\PageInterface;
use Thrive\SpagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;


class PageResolver
{

    /**
     * The page repository.
     *
     * @var PageRepositoryInterface
     */
    protected $pages;

    /**
     * The active route.
     *
     * @var Route
     */
    protected $route;

    /**
     * Create a new PageResolver instance.
     *
     * @param PageRepositoryInterface $pages
     * @param Route $route
     * @param Container $container
     */
    public function __construct(PageRepositoryInterface $pages, Route $route)
    {
        $this->pages = $pages;
        $this->route = $route;
    }

    /**
     * Resolve the page.
     *
     * @return PageInterface|EloquentModel|null
     */
    public function resolve()
    {
        $action = $this->route->getAction();

        if ($id = array_get($action, 'thrive.module.spages::page')) {
            return $this->pages->find($id);
        }

        return null;
    }
}
