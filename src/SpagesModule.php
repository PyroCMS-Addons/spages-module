<?php namespace Thrive\SpagesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class SpagesModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-book';

    /**
     * The module sections.
     *
     * @var array
     */
    // protected $sections = [];
    protected $sections = [
        'pages' => [
            'href' => 'admin/spages/pages',
            'buttons' => [
                'new_page',

            ],
        ],                      
    ];

}
