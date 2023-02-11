<?php 

namespace WPSEEDM\Mod\Action_Email\Filter;

use WPSEEDM\Mod\Action_Email\Type\Email as Type_Email;

class Email 
{
    public function __construct()
    {
        add_filter('manage_wpseedm_action_email_posts_columns', [$this, 'addEmailTableColumns'], 20);
        add_action('manage_wpseedm_action_email_posts_custom_column', [$this, 'addEmailTableColumnsData'], 20, 2);
    }

    public function addEmailTableColumns($columns)
    {
        $columns['wpseedm_email_action__action'] = __('Email action', 'wpseedm');
        $columns['wpseedm_email_action__default_header'] = __('Default header', 'wpseedm');
        $columns['wpseedm_email_action__default_footer'] = __('Default footer', 'wpseedm');

        if(isset($columns['date']))
        {
            unset($columns['date']);
        }

        return $columns;
    }

    public function addEmailTableColumnsData($column_name, $post_id)
    {
        switch($column_name)
        {
            case 'wpseedm_email_action__action':
                $type_email = new Type_Email($post_id);
                echo $type_email->get_email_action();
            break;
            case 'wpseedm_email_action__default_header':
                $type_email = new Type_Email($post_id);
                echo $type_email->has_inc_default_header() ? __('yes', 'wpseedm') : '';
            break;
            case 'wpseedm_email_action__default_footer':
                $type_email = new Type_Email($post_id);
                echo $type_email->has_inc_default_footer() ? __('yes', 'wpseedm') : '';
            break;
        }        
    }
}