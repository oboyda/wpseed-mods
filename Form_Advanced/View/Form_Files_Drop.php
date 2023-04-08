<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Files_Drop extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Form_Advanced';

    public function __construct($args)
    {
        parent::__construct($args, [
            'input_name' => '',
            'drop_label' => __('Drop files here or choose files below', 'wpseedm'),
            'input_class' => 'action-btn',
            'label_class' => 'action-btn',
            'input_label' => '',
            'multiple' => false
        ]);

        $this->setHtmlClass();
    }

    private function setHtmlClass()
    {
        if($this->has_input_label()):
            $this->addHtmlClass('has-input-label');
        endif;
    }

    public function getInputName()
    {
        return $this->args['multiple'] ? $this->args['input_name'] . '[]' : $this->args['input_name'];
    }
}