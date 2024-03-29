<div class="<?php echo $view->getHtmlClass(); ?>" data-view="<?php echo $view->getName(); ?>">

    <?php $view->openContainer(); ?>

    <div class="toggle-contents">
        <div class="toggle-content content-login-form<?php if($view->isFormActive('login')) echo ' active'; ?>">

            <h3 class="form-title"><?php _e('Log in', 'wpseedm'); ?></h3>

            <form class="ajax-form login--form" method="POST">
                <div class="form-block">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="user_login" placeholder="<?php _e('User name / Email', 'wpseedm'); ?>" value="<?php echo $view->getReq('user_login'); ?>" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="password" name="user_pass" placeholder="<?php _e('Password', 'wpseedm'); ?>" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-block submit">
                    <button type="submit" class="app-btn w-full"><?php _e('Login', 'wpseedm'); ?></button>
                </div>
                <div class="form-block remember-recover">
                    <div class="row">
                        <div class="col-6">
                            <?php if($view->has_show_remember()): ?>
                            <div class="nice-checkbox">
                                <input type="checkbox" id="remember" name="remember" value="1" checked /> 
                                <label for="remember"><?php _e('Remember me', 'wpseedm'); ?></label>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <div class="recover-pass ta-right">
                                <a href="#" class="toggle-content-btn" data-content_name="content-resetpass-form"><?php _e('Forgot your password?', 'wpseedm'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($view->has_redirect()): ?>
                <input type="hidden" name="redirect" value="<?php echo $view->get_redirect(); ?>" />
                <?php endif; ?>

                <input type="hidden" name="action" value="wpseedm_user_login" />

                <div class="messages-cont"></div>
            </form>
        </div>
        <div class="toggle-content content-resetpass-form<?php if($view->isFormActive('resetpass')) echo ' active'; ?>">

            <h3 class="form-title"><?php _e('Reset password', 'wpseedm'); ?></h3>

            <form class="ajax-form resetpass-form" method="POST">
                <div class="form-block">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-input">
                                <?php if($view->hasReq('resetpasshash') && $view->hasReq('user_login')): ?>
                                <input type="password" name="user_pass" placeholder="<?php _e('New password', 'wpseedm'); ?>" required />
                                <input type="hidden" name="user_login" value="<?php echo $view->getReq('user_login'); ?>" />
                                <input type="hidden" name="resetpasshash" value="<?php echo $view->getReq('resetpasshash'); ?>" />
                                <?php else: ?>
                                <input type="text" name="user_login" placeholder="<?php _e('User name / Email', 'wpseedm'); ?>" required />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input submit">
                                <button type="submit" class="app-btn w-full"><?php _e('Reset', 'wpseedm'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!($view->hasReq('resetpasshash') && $view->hasReq('user_login'))): ?>
                <div class="form-block ta-right">
                    <a href="#" class="toggle-content-btn" data-content_name="content-login-form"><?php _e('Back to login', 'wpseedm'); ?></a>
                </div>
                <?php endif; ?>

                <input type="hidden" name="action" value="wpseedm_resetpass" />

                <div class="messages-cont"></div>
            </form>
        </div>
    </div>

    <?php $view->closeContainer(); ?>

</div>