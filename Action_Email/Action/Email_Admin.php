<?php 

namespace WPSEEDM\Mod\Action_Email\Action;

use WPSEEDM\Mod\Action_Email\Type\Email as Type_Email;
use WPSEEDM\Mod\Action_Email\Utils\Email as Utils_Email;

class Email_Admin extends \WPSEED\Action 
{
    protected $meta_box_updated;

    public function __construct()
    {
        parent::__construct();
        
        add_action('add_meta_boxes', [$this, 'addMetaBox']);
        add_action('save_post_wpseedm_action_email', [$this, 'saveMetaBoxData']);
    }

    public function addMetaBox()
    {
        add_meta_box(
            'email-actions-metabox', 
            __('Email details', 'wpseedm'), 
            [$this, 'renderMetaboxEmailActions'], 
            'wpseedm_action_email',
            // 'side'
        );
    }

    public function saveMetaBoxData($post_id)
    {
        if(!empty($this->meta_box_updated))
        {
            return;
        }

        $email_action = $this->getReq('wpseedm_email_action__action', 'text', '');
        $email_subject = $this->getReq('wpseedm_email_action__subject', 'text', '');
        $inc_default_header = (bool)$this->getReq('wpseedm_email_action__inc_default_header');
        $inc_default_footer = (bool)$this->getReq('wpseedm_email_action__inc_default_footer');

        // print_r([$email_action, $email_subject, $inc_default_header, $inc_default_footer]); 
        // exit;

        $type_email = new Type_Email($post_id);

        $type_email->set_prop('email_action', $email_action);
        $type_email->set_prop('email_subject', $email_subject);
        $type_email->set_prop('inc_default_header', $inc_default_header);
        $type_email->set_prop('inc_default_footer', $inc_default_footer);

        $this->meta_box_updated = true;

        $type_email->persist();
    }

    public function renderMetaboxEmailActions($post)
    {
        $type_email = new Type_Email($post);
        ?>

        <table class="form-table">
            <tbody>
            <tr>
                <th><label><?php _e('Email action', 'wpseedm'); ?></label></th>
                <td>
                    <select name="wpseedm_email_action__action">
                        <option value="">--</option>
                        <?php 
                        foreach(Utils_Email::getEmailActions() as $h => $action_name): 
                            $selected = ($h == $type_email->get_email_action()) ? ' selected' : '';
                            ?>
                        <option value="<?php echo $h; ?>"<?php echo $selected; ?>><?php echo $action_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <?php if(!in_array($type_email->get_email_action(), ['default_header', 'default_footer'])): ?>
            <tr>
                <th><label><?php _e('Email subject', 'wpseedm'); ?></label></th>
                <td>
                    <input type="text" class="regular-text" name="wpseedm_email_action__subject" value="<?php echo $type_email->get_email_subject(); ?>" />
                </td>
            </tr>
            <?php endif; ?>

            <?php if(!in_array($type_email->get_email_action(), ['default_header', 'default_footer'])): ?>
            <tr>
                <th><label><?php _e('Include default header.', 'wpseedm'); ?></label></th>
                <td>
                    <input type="checkbox" name="wpseedm_email_action__inc_default_header" value="1" <?php checked($type_email->has_default_header(), true); ?> />
                </td>
            </tr>
            <?php endif; ?>

            <?php if(!in_array($type_email->get_email_action(), ['default_header', 'default_footer'])): ?>
            <tr>
                <th><label><?php _e('Include default footer.', 'wpseedm'); ?></label></th>
                <td>
                    <input type="checkbox" name="wpseedm_email_action__inc_default_footer" value="1"<?php checked($type_email->has_default_footer(), true); ?> />
                </td>
            </tr>
            <?php endif; ?>

            </tbody>
        </table>
        <?php 
    }
}