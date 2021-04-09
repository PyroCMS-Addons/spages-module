<?php namespace Thrive\SpagesModule\Console;

use Thrive\SpagesModule\Page\Command\CreateStaticPageRoutes;
use Illuminate\Console\Command;

/**
 * Class Dump
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Dump extends Command
{

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'spages:dump';

    /**
     * Handle the command.
     */
    public function handle()
    {
        dispatch_now(new CreateStaticPageRoutes());

        $this->info('Wrote: ' . app_storage_path('spages/routes.php'));
    }
}
