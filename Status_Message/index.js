import { StatusPopup } from "./js/StatusPopup";

jQuery(function($){

    /*
    .view.status-message.status-popup
    --------------------------------------------------
    */
    $(document.body).viewAddLoadedListener("eun.status-message.status-popup", function(e, view, viewRegistry){

        viewRegistry.addInterface(new StatusPopup(view));
    });
});