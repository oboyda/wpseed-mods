<?php 

namespace EUN\Mod\Status_Message\Action\View;

class Status_Popup 
{
    public function __construct()
    {
        add_action('wp_footer', [$this, 'printPopup']);
    }

    public function printPopup()
    {
        eun_print_view('Status_Message/status-popup');
    }
}
