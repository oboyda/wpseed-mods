<?php

namespace DFRP\Mod\Site_Loader\View;

class Site_Loader extends \DFRP\View\View 
{
    CONST MOD_NAME = 'Site_Loader';

    public function __construct($args)
    {
        parent::__construct($args, [
            'pos' => '', #full
            'shadow' => '' #light, dark
        ]);

        $this->_setHtmlClass();
    }

    protected function _setHtmlClass()
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
