import { SiteModal } from './js/SiteModal';

jQuery(function($){

    /*
    .view.site-modal
    --------------------------------------------------
    */
    $(document.body).viewAddLoadedListener("wpseedm.site-modal.site-modal", function(e, view, viewRegistry){

        viewRegistry.addInterface(new SiteModal(view));

        $(document.body).on("wpseedm_open_site_modal", function(e, _args={}){
            viewRegistry.interface.open(_args);
        });

        $(document.body).on("wpseedm_open_site_modal_load", function(e, _args={}){
            viewRegistry.interface.openLoadView(_args);
        });
    });
});