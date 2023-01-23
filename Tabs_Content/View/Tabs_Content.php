<?php

namespace WPSEEDM\Mod\Tabs_Content\View;

class Tabs_Content extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        $this->setModName('Tabs_Content');

        parent::__construct($args, [

            'tabs_pos' => 'left',
            'size' => 'normal',
            'items' => []
        ]);

        $this->parseItems();
        $this->_setHtmlClass();
    }

    protected function parseItems()
    {
        foreach($this->args['items'] as $i => $item)
        {
            $this->args['items'][$i] = wp_parse_args($item, [
                'tab_title' => '',
                'tab_content' => ''
            ]);
        }
    }

    protected function _setHtmlClass()
    {
        $this->addHtmlClass('pos-' . $this->args['tabs_pos']);
        $this->addHtmlClass('size-' . $this->args['size']);
    }
}