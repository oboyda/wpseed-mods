<?php

namespace WPSEEDM\Mod\User_Login\View;

class Resetpass_Status extends \WPSEEDM\View\View 
{
    const MOD_NAME = 'User_Login';
    
    public function __construct($args)
    {
        parent::__construct($args, [

            'status' => false,
            'email' => '',
            'success_message' => __('Password has been reset successfully! New password has been sent to %s.', 'wpseedm'),
            'error_message' => __('Failed to reset password! Please try again later.', 'wpseedm'),
            'back_url' => home_url(),
            'back_label' => __('Close', 'wpseedm')
        ]);

        $this->setArgs();
    }

    private function setArgs()
    {
        if($this->has_email())
        {
            $this->args['success_message'] = sprintf($this->args['success_message'], $this->get_email());
        }
    }
}
