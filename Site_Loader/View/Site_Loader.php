<?php

namespace WPSEEDM\Mod\Site_Loader\View;

class Site_Loader extends \WPSEEDM\View\View 
{
    CONST MOD_NAME = 'Site_Loader';

    public function __construct($args)
    {
        parent::__construct($args, [
            'pos' => '', #full
            'shadow' => '', #light, dark,
            'bootstrap_type' => 'spinner-grow'
        ]);

        $this->setHtmlClass();
    }

    private function setHtmlClass()
    {
        if($this->args['pos'])
        {
            $this->addHtmlClass('pos-' . $this->args['pos']);
        }
        if($this->args['shadow'])
        {
            $this->addHtmlClass('shadow-' . $this->args['shadow']);
        }
    }
}
