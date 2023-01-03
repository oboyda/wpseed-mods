<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Nice_Checkbox_Single extends Form_Nice_Checkbox 
{
    public function __construct($args)
    {
        parent::__construct($args, [

            'multiple' => false,
            
            'single_name' => '',
            'single_value' => '',
            'single_icon_html' => '',
            'single_icon_class' => ''
        ]);

        $this->setArgs();
        $this->_setOptions();
        $this->addHtmlClass('form-nice-checkbox');
        $this->_setHtmlClass();
    }

    protected function _setOptions()
    {
        $this->options[] = [
            'name' => $this->args['name'],
            'value' => $this->args['name'],
            'icon_html' => $this->args['icon_html'],
            'icon_class' => $this->args['icon_class']
        ];

        $this->setOptions();
    }
}