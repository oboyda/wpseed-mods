<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Input_Location extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Form_Advanced';

    public function __construct($args)
    {
        parent::__construct($args, [
            'input_name' => 'location',
            'input_label' => __('Location', 'wpseedm')
        ]);
    }
}
