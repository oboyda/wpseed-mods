<?php 

add_action('after_setup_theme', function(){
    global $wpseedm_setup;

    if(!isset($wpseedm_setup))
    {
        return;
    }

    $wpseedm_setup->scripts->addScriptDep([
        'build_index_front' => ['jquery-ui-datepicker']
    ]);
    
});
