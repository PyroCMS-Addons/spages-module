<?php namespace Thrive\SpagesModule\Page;



use Thrive\SpagesModule\Page\Command\CreateStaticPageRoutes;
use Thrive\SpagesModule\Page\Contract\PageInterface;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Entry\EntryObserver;


class PageObserver extends EntryObserver
{
    /**
     * Fired after saving the page.
     *
     * @param EntryInterface|PageInterface|EntryModel $entry
     */
    public function saved(EntryInterface $entry)
    {
        parent::saved($entry);

        $this->dispatch(new CreateStaticPageRoutes());
    }
}
