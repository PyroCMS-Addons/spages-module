`<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class ThriveModuleSpagesCreateFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'      => 'anomaly.field_type.text',
        'url' => [
            "type"   => "anomaly.field_type.url",
            "config" => [
                "default_value" => null,
            ]
        ],
        'layout'     => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'default_value' => 'module::static_pages/default.twig',
                'handler'       => 'Thrive\SpagesModule\SelectFieldType\Handler\StaticPages@handle',
            ],
        ],
        'enabled'    => [
            "type"      => "anomaly.field_type.boolean",
            "config" => [
                "default_value" => true,
                "on_color"      => "success",
                "off_color"     => "danger",
                "on_text"       => "YES",
                "off_text"      => "NO",
                "mode"          => "switch",
                "label"         => null,
            ]
        ],  
    ];
}
