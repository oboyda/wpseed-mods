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
            'btn_class' => 'app-btn bc-grey5',
            'multiple' => false
        ]);
    }

    public function getInputName()
    {
        return $this->args['multiple'] ? $this->args['input_name'] . '[]' : $this->args['input_name'];
    }
}