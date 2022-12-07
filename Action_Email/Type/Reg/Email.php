<?php

namespace WPSEEDM\Mod\Action_Email\Type\Reg;

class Email 
{
    public function __construct()
    {
        add_action('init', __CLASS__ . '::registerType');
    }

    static function registerType()
    {
        $labels = [
            'name'               => _x('Action Emails', 'post type general name', 'wpseedm'),
            'singular_name'      => _x('Action Email', 'post type singular name', 'wpseedm'),
            'menu_name'          => _x('Action Emails', 'admin menu', 'wpseedm'),
            'name_admin_bar'     => _x('Action Emails', 'add new on admin bar', 'wpseedm'),
            'add_new'            => _x('Add action email', 'action email type', 'wpseedm'),
            'add_new_item'       => __('Add new action email', 'wpseedm'),
            'new_item'           => __('New action email', 'wpseedm'),
            'edit_item'          => __('Edit action email', 'wpseedm'),
            'view_item'          => __('View action email', 'wpseedm'),
            'all_items'          => __('All action emails', 'wpseedm'),
            'search_items'       => __('Search action emails', 'wpseedm'),
            'parent_item_colon'  => __('Action Email parent:', 'wpseedm'),
            'not_found'          => __('No action emails found.', 'wpseedm'),
            'not_found_in_trash' => __('No action emails found in trash.', 'wpseedm')
        ];
        $args = [
            'labels'              => $labels,
            'description'         => __('Action Email post type.', 'wpseedm'),
            'public'              => false,
            'publicly_queryable'  => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'query_var'           => true,
            // 'rewrite'             => array('slug' => _x('action-email', 'URL slug', 'wpseedm')),
            'capability_category' => 'post',
            'has_archive'         => true,
            'hierarchical'        => false,
            'menu_position'       => 56,
            'menu_icon'           => 'dashicons-email',
            'supports'            => array('title', 'editor')
        ];

        register_post_type('action_email', $args);
    }
}
