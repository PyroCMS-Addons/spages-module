<?php

namespace Thrive\SpagesModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Message\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Thrive\SpagesModule\Page\PageModel;
use Thrive\SpagesModule\Page\PageResolver;


class PagesController extends PublicController
{

    /**
     * Get from DB or cache the file for the view
     */
    public function page( PageResolver $resolver, MessageBag $messages )
    {

        if (!$page = $resolver->resolve()) {
            abort(404);
        }  

        // dd($page->layout );
        return view( $page->layout );
    }

}
