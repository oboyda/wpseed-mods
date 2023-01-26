import { ViewUpdater } from '../../../vendor/oboyda/wp-seed-e/src/js/mods/ViewUpdater';

export class StatusPopup extends ViewUpdater 
{
    constructor(view)
    {
        super(view);
        
        this.setConfigElems({

            content: ".popup-content",
            close_btn: ".popup-close"
        });

        this.setConfigsDefault({
            
            content: {
                text: ""
            }
        });

        this._setOpened(false);
        this._addEventHandlers();
    }

    _setOpened(opened)
    {
        this.opened = opened;
    }

    _addEventHandlers()
    {
        this.elems.close_btn.on("click", this.hide.bind(this));
    }

    show(content, type='success')
    {
        this.view.addClass("opened");
        this.view.addClass("type-"+type);
        this.setConfig("content.text", content, true);

        setTimeout(() => {
            this.hide();
        }, 5000);

        this._setOpened(true);
    }

    hide()
    {
        if(!this.opened)
        {
            return;
        }

        this.view.removeClass("opened");
        this.view.removeClass("type-success");
        this.view.removeClass("type-error");
        this.applyConfigs();

        this._setOpened(false);
    }
}