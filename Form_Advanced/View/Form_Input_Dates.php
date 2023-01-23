<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Input_Dates extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Form_Advanced';

    public function __construct($args)
    {
        parent::__construct($args, [
            
            'input_name_from' => '',
            'input_name_till' => '',
            'label_from' => __('Date from', 'wpseedm'),
            'label_till' => __('Date till', 'wpseedm')
        ]);
    }
}
