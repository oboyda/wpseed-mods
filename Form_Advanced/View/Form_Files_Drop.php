<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Files_Drop extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        $this->setModName('Form_Advanced');

        parent::__construct($args, [
            'input_name' => '',
            'drop_label' => __('Drop files here or choose files below', 'wpseedm'),
            'multiple' => false
        ]);
    }

    public function getInputName()
    {
        return $this->args['multiple'] ? $this->args['input_name'] . '[]' : $this->args['input_name'];
    }
}