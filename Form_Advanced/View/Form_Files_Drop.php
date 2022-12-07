<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Files_Drop extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        parent::__construct($args, [
            'input_name' => '',
            'drop_label' => __('Drop files here or choose files below', 'wpseedm'),
            'max_files' => 3
        ]);
    }
}
