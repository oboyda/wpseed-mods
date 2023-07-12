<?php 

namespace WPSEEDM\Mod\Action_Email\Type;

use WPSEEDM\Mod\Action_Email\Utils\Email as Utils_Email;

class Email extends \WPSEEDE\Post 
{
    public $placeholders;

    public function __construct($post=null)
    {
        $this->post_type = 'wpseedm_action_email';

        parent::__construct($post, self::_get_props_config());
    }

    static function _get_props_config()
    {
        return [
            'email_action' => [
                'sys_key' => 'wpseedm_email_action__action',
                'type' => 'meta'
            ],
            'email_subject' => [
                'sys_key' => 'wpseedm_email_action__subject',
                'type' => 'meta'
            ],
            'inc_default_header' => [
                'sys_key' => 'wpseedm_email_action__inc_default_header',
                'type' => 'meta',
                'cast' => 'bool'
            ],
            'inc_default_footer' => [
                'sys_key' => 'wpseedm_email_action__inc_default_footer',
                'type' => 'meta',
                'cast' => 'bool'
            ]
        ];
    }

    public function setPlaceholders($placeholders)
    {
        $this->placeholders = $placeholders;
    }

    public function getSubject($placeholders=null)
    {
        if(isset($placeholders)){
            $this->placeholders = $placeholders;
        }

        $subject = $this->has_email_subject() ? $this->get_email_subject() : $this->getTitle();
        return $this->replacePlaceholders($subject);
    }

    public function getBody($placeholders=null)
    {
        if(isset($placeholders)){
            $this->placeholders = $placeholders;
        }

        return $this->replacePlaceholders($this->getContent(false));
    }

    public function replacePlaceholders($str)
    {
        $placeholders_global = Utils_Email::getGlobalPlaceholders();
        $placeholders = isset($this->placeholders) ? array_merge($this->placeholders, $placeholders_global) : $placeholders_global;
        $placeholders = apply_filters('wpseedm_action_email_placeholders', $placeholders, $this);

        if($str && $placeholders)
        {
            $placeholder_keys = array_keys($placeholders);
            $placeholder_vals = array_values($placeholders);

            $str = str_replace($placeholder_keys, $placeholder_vals, $str);
        }

        return $str;
    }
}