<?php 

namespace WPSEEDM\Mod\Site_Modal\Action;

class Site_Modal extends \WPSEED\Action 
{
    public function __construct()
    {
        parent::__construct();
        
        add_action('wp_footer', [$this, 'printModalView']);
    }

    public function printModalView()
    {
        wpseedm_print_view('Site_Modal/site-modal');
    }
}