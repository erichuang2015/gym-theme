<?php

namespace GymCore\GymPages;

use Carbon_Fields\Container;

class OptionsPage
{
    private $fields = [];
    public function __construct($title, $fields)
    {
        $this->fields = array_keys($fields);
        $carbon_fields = array_values($fields);
        $container = Container::make('theme_options', $title)
            ->add_fields($carbon_fields);
    }

    public function getFields()
    {
        return $this->fields;
    }
}
