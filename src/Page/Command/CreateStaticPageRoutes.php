<?php namespace Thrive\SpagesModule\Page\Command;

use Thrive\SpagesModule\Page\Contract\PageInterface;
use Thrive\SpagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Routing\Command\CacheRoutes;

/**
 * Class CreateStaticPageRoutes
 *
 */
class CreateStaticPageRoutes
{

    /**
     * Handle the command.
     *
     * @param PageRepositoryInterface $pages
     */
    public function handle( PageRepositoryInterface $pages )
    {
        $file = app_storage_path('spages/routes.php');

        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        // dd($pages->map(
        //     function ( PageInterface $page ) {
        //         dd($page->name);
        //     })
        // );

        $content = join(
            "\n\n",
            $pages
                ->routable()
                ->map(
                    function ( PageInterface $page ) {
                        return $page
                            ->getRoute($page);
                    }
                )->all()
        );

        file_put_contents($file, "<?php\n\n" . $content);

        dispatch_now(new CacheRoutes());
    }
}
