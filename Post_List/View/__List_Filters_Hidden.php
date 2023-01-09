<?php

namespace WPSEEDM\Mod\Post_List\View;

use WPSEEDE\Utils\Base as Utils_Base;

class List_Filters_Hidden extends \WPSEEDM\View\View 
{
    public function __construct($args, $default_args=[])
    {
        parent::__construct($args, wp_parse_args($default_args, [
            
            'q_args' => [],
            
            'paged' => 1,
            'action_name' => 'wpseedm_load_post_list',

            'list_view' => '',
            'list_args' => []
        ]));

        $this->filterListArgs();
    }

    protected function filterListArgs()
    {
        if(isset($this->args['list_args']['items']))
        {
            unset($this->args['list_args']['items']);
        }
        if(isset($this->args['list_args']['block_data']))
        {
            unset($this->args['list_args']['block_data']);
        }
    }

    public function getPostId()
    {
        return Utils_Base::getGlobalPostId();
    }
}