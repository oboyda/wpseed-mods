<?php 

namespace WPSEEDM\Mod\Action_Email\Utils;

use WPSEEDE\Utils\Type_List as Utils_Type_List;

class Email 
{
    static function getEmailActions()
    {
        return apply_filters('wpseedm_action_email_actions', [
            'default_header' => __('Default header', 'wpseedm'),
            'default_footer' => __('Default footer', 'wpseedm'),
            'resetpass' => __('Reset password', 'wpseedm'),
            'email_verification' => __('Verification email', 'wpseedm')
        ]);
    }

    static function getGlobalPlaceholders()
    {
        return apply_filters('wpseedm_action_email_global_placeholders', [
            '%sitename%' => get_bloginfo('name'),
            '%siteurl%' => get_site_url()
        ]);
    }

    static function getFromName()
    {
        return apply_filters('wpseedm_action_email_from_name', get_option('blogname'));
    }

    static function getFromEmail()
    {
        return apply_filters('wpseedm_action_email_from_email', get_option('admin_email'));
    }

    static function getEmailByAction($action)
    {
        $args = apply_filters('wpseedm_action_email_get_args', [
            'email_action' => $action,
            'posts_per_page' => 1
        ], $action);

        $items = Utils_Type_List::getItems($args, 'WPSEEDM\Mod\Action_Email\Type\Email');

        return isset($items['items'][0]) ? $items['items'][0] : null;
    }

    static function sendEmailByAction($to_email, $action, $placeholders=[], $return_body=false)
    {
        $type_email = self::getEmailByAction($action);
        if(!isset($type_email))
        {
            return false;
        }

        $type_email->setPlaceholders($placeholders);

        $subject = $type_email->getSubject();
        $body = $type_email->getBody();
        $headers = [
            'Content-Type: text/html; charset=UTF-8'
            // 'From: ' . self::getFromName() . ' <' . self::getFromEmail() . '>'
        ];

        if($type_email->has_inc_default_header())
        {
            $type_email_header = self::getEmailByAction('default_header');
            if(isset($type_email_header))
            {
                $type_email_header->setPlaceholders($placeholders);
                $body = $type_email_header->getBody() . $body;
            }
        }
        if($type_email->has_inc_default_footer())
        {
            $type_email_footer = self::getEmailByAction('default_footer');
            if(isset($type_email_footer))
            {
                $type_email_footer->setPlaceholders($placeholders);
                $body = $body . $type_email_footer->getBody();
            }
        }

        $mail_args = apply_filters('wpseedm_action_email_args', [
            'to_email' => $to_email,
            'subject' => $subject,
            'body' => $body,
            'headers' => $headers,
            'attachments' => []
        ], $action, $placeholders, $type_email);

        $sent = wp_mail(
            $mail_args['to_email'], 
            $mail_args['subject'], 
            $mail_args['body'], 
            $mail_args['headers'],
            $mail_args['attachments']
        );

        if($sent && $return_body)
        {
            return $body;
        }

        return $sent;
    }
}