<?php namespace Thrive\SpagesModule\Page\Contract;

use Thrive\SpagesModule\Page\PageCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

interface PageRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Return only routable pages.
     *
     * @return PageCollection
     */
    //public function routable();


    /**
     * Find a page by it's path.
     *
     * @param $path
     * @return PageInterface|null
     */
    //public function findByPath($path);
}
