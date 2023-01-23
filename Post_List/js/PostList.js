export class PostList 
{
    constructor(view)
    {
        this.view = view;

        this.setView(view);
        this.addListeners();
    }

    setView(view)
    {
        this.view = view;

        const filtersFormSelector = this.view.data("filters_form");
        const filtersForm = (typeof filtersFormSelector !== "undefined") ? jQuery(filtersFormSelector) : this.view.find("form.filters-form");

        this.setFiltersForm(filtersForm);
    }

    setFiltersForm(filtersForm)
    {
        this.filtersForm = filtersForm;
        this.filtersFormPagedInput = this.filtersForm.find("input[name='paged']");

        // this.viewListPager = this.view.find(".view.list-pager.ajax-pager");
    }

    addListeners()
    {
        const _this = this;

        this.filtersForm.on("wpseedm_submit_ajax_form_after", function(e, resp, data){
            if(
                resp.status && 
                typeof resp.values !== 'undefined' && 
                typeof resp.values.view_parts_html !== 'undefined' 
            ){
                _this.view.viewUpdateParts(resp.values.view_parts_html, true);
            }
            _this.view.removeClass("loading");
        });

        // this.viewListPager.on("click", "li.page a", function(e){
        this.view.on("click", ".view.list-pager.ajax-pager li.page a", function(e){
            e.preventDefault();

            const a = jQuery(this);
            const page = parseInt(a.data("page"));

            _this.filtersFormPagedInput.val(page);
            _this.filtersFormPagedInput.change();
        });
    }
}
