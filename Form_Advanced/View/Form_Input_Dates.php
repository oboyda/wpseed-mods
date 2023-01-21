<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Input_Dates extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        $this->setModName('WPSEEDM_Form_Advanced');

        parent::__construct($args, [
            
            'input_name_from' => '',
            'input_name_till' => '',
            'label_from' => __('Date from', 'wpseedm'),
            'label_till' => __('Date till', 'wpseedm')
        ]);
    }
}
