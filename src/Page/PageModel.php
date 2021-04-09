<?php namespace Thrive\SpagesModule\Page;

use Anomaly\Streams\Platform\Model\Spages\SpagesPagesEntryModel;
use Thrive\SpagesModule\Page\PageModel;
use Thrive\SpagesModule\Page\Contract\PageInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageModel extends SpagesPagesEntryModel implements PageInterface
{

    /**
     * Return the page's route dump.
     * Currently only supporting english
     *
     * @param PageInterface $page
     * @return null|string
     */
    public function getRoute( PageInterface $page )
    {
        return "Route::any('{$page->url}', [
            'uses'                       => 'Thrive\\SpagesModule\\Http\\Controller\\PagesController@page',
            'as'                         => 'spages::{$page->id}.en',
            'streams::addon'             => 'thrive.module.spages',
            'thrive.module.spages::page' => {$page->id},
        ]);";

    }
}
