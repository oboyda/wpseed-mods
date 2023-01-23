<?php

namespace WPSEEDM\Mod\Site_Modal\View;

class Site_Modal extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Site_Modal';

    public function __construct($args)
    {
        parent::__construct($args, [
            
            'title' => '&nbsp',
            'body_content' => 'Modal content goes here'
        ]);
    }
}
