<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class ThriveModuleSpagesCreatePagesStream extends Migration
{

    /**
     * This migration creates the stream.
     * It should be deleted on rollback.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'pages',
        'title_column'  => 'name',
        'translatable'  => false,
        'versionable'   => false,
        'trashable'     => true,
        'searchable'    => true,
        'sortable'      => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'unique' => true,
            'required' => true,
        ],
        'url' => [
            'unique' => true,
            'required' => true,
        ],         
        'layout' => [
            'unique' => false,
            'required' => true,
        ],             
        'enabled' => [
            'unique' => false,
            'required' => false,
        ],
         
    ];

}
