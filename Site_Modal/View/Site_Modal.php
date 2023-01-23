<?php

namespace WPSEEDM\Mod\Site_Modal\View;

class Site_Modal extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        $this->setModName('Site_Modal');

        parent::__construct($args, [
            
            'title' => '&nbsp',
            'body_content' => 'Modal content goes here'
        ]);
    }
}
