<?php namespace Thrive\SpagesModule\Page;

use Thrive\SpagesModule\Page\Contract\PageRepositoryInterface;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;

class PageRepository extends EntryRepository implements PageRepositoryInterface
{

    use DispatchesJobs;


    /**
     * The entry model.
     *
     * @var PageModel
     */
    protected $model;

    /**
     * Create a new PageRepository instance.
     *
     * @param PageModel $model
     */
    public function __construct( PageModel $model )
    {
        $this->model = $model;
    }

    /**
     * Return only routable pages. 
     *
     * @return PageCollection
     */
    public function routable()
    {
        return $this->model->where('enabled',1)->get();
    }   
    

    // public function findByPath($path)
    // {
    //     return $this->model
    //         ->whereHas(
    //             'translations',
    //             function (Builder $query) use ($path) {
    //                 $query->where('path', $path);
    //             }
    //         )
    //         ->first();
    // }
}
