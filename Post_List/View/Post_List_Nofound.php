<?php

namespace WPSEEDM\Mod\Post_List\View;

class Post_List_Nofound extends \WPSEEDM\View\View 
{
    public function __construct($args, $default_args=[])
    {
        parent::__construct($args, wp_parse_args($default_args, [
            
            'nofound_text' => __('No items found', 'wpseedm')
        ]));
    }
}