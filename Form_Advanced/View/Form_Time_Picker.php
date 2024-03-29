<?php

namespace WPSEEDM\Mod\Form_Advanced\View;

class Form_Time_Picker extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Form_Advanced';

    public function __construct($args)
    {
        parent::__construct($args, [

            'input_name' => '',
            'ranges' => false,
            'label' => __('Select time', 'wpseedm'), 
            'time_fraction' => 60, # 60, 30, 15,
            'value' => ''
        ]);

        $this->setHtmlClass();
    }

    private function setHtmlClass()
    {
        if($this->has_ranges())
        {
            $this->addHtmlClass('has-ranges');
        }
    }

    public function getOptions()
    {
        $opts = [];

        $tf = in_array($this->args['time_fraction'], [60, 30, 15]) ? $this->args['time_fraction'] : 60;

        for($i=0; $i < 24; $i++)
        {
            $_i = ($i < 10) ? '0' . strval($i) : strval($i);

            for($f=0; $f < (60/$tf); $f++)
            {
                $_mf = $f*$tf;
                $_f = ($_mf < 10) ? '0' . strval($_mf) : strval($_mf);

                $opts[] = $_i . ':' . $_f;
            }            
        }

        return $opts;
    }
}
