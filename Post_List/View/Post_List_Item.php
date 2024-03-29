<?php

namespace WPSEEDM\Mod\Post_List\View;

class Post_List_Item extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Post_List';

    public $item;

    public function __construct($args, $default_args=[])
    {
        parent::__construct($args, wp_parse_args($default_args, [

            'item' => null,
            'type_class' => '\WPSEEDM\Type\Post'
        ]));

        $type_class = $this->args['type_class'];
        $this->item = (is_int($this->args['item']) && class_exists($type_class)) ? new $type_class($this->args['item']) : $this->args['item'];
    }
}