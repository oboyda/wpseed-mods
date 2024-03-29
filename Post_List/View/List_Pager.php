<?php

namespace WPSEEDM\Mod\Post_List\View;

class List_Pager extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'Post_List';

    var $pages_max;

    public function __construct($args)
    {
        $this->pages_max = 0;

        parent::__construct($args, [
            
            'paged' => 1,
            'items_total' => 0,
            'items_per_page' => 10,
            'pages_visible' => 10,
            'show_first_last' => false,
            'ajax_pager' => false,
            'align' => 'center',

            'btn_class' => 'app-btn size-small',
            'btn_prev_label' => '',
            'btn_prev_icon_html' => '<i class="bi bi-chevron-left"></i>',
            'btn_next_label' => '',
            'btn_next_icon_html' => '<i class="bi bi-chevron-right"></i>'
        ]);

        $this->setArgs();
        $this->setHtmlClass();
    }

    private function setArgs()
    {
        if(!$this->args['items_total'])
        {
            return;
        }

        $this->pages_max = ceil($this->args['items_total'] / $this->args['items_per_page']);

        $pages = [];
        for($p=1; $p<=$this->pages_max; $p++)
        {
            $pages[] = $p;
        }

        if($this->args['pages_visible'] > $this->pages_max && $this->pages_max)
        {
            $this->args['pages_visible'] = $this->pages_max;
        }

        $this->args['page_chunks'] = array_chunk($pages, $this->args['pages_visible']);
        $this->args['page_chunks_num'] = count($this->args['page_chunks']);

        $this->args['page_prev'] = ($this->args['paged'] > 0) ? $this->args['paged'] - 1 : 1;
        $this->args['page_next'] = ($this->args['paged'] < $this->pages_max) ? $this->args['paged'] + 1 : $this->pages_max;
    }

    private function setHtmlClass()
    {
        if($this->args['ajax_pager'])
        {
            $this->addHtmlClass('ajax-pager');
        }
        $this->addHtmlClass('align-' . $this->args['align']);
    }
}