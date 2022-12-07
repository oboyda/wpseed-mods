<?php

namespace WPSEEDM\Mod\Status_Message\View;

class Status_Message extends \WPSEEDM\View\View 
{
    public function __construct($args)
    {
        parent::__construct($args, [

            'type' => 'success',
            'message' => ''
        ]);
    }
}
