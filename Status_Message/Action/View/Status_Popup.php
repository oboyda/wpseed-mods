<?php 

namespace WPSEEDM\Mod\Status_Message\Action\View;

class Status_Popup 
{
    public function __construct()
    {
        add_action('wp_footer', [$this, 'printPopup']);
    }

    public function printPopup()
    {
        wpseedm_print_view('Status_Message/status-popup');
    }
}
