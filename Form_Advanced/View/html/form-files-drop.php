<div class="<?php echo $view->getHtmlClass('advanced-input'); ?>" data-view="<?php echo $view->getName(); ?>">
    <div class="drop-area d-none d-lg-block">
        <div class="drop-label"><?php echo $view->get_drop_label(); ?></div>
        <div class="drop-summary"></div>
        <div class="input-file">
            <input type="file" name="<?php echo $view->getInputName(); ?>" class="<?php echo $view->get_btn_class(); ?>"<?php if($view->has_multiple()) echo ' multiple="true"'; ?> />
        </div>
        <div class="clear-file">
            <span class="clear-btn">
                <i class="bi bi-x-circle"></i>
                <?php _e('Clear files', 'wpseedm'); ?>
            </span>
        </div>
    </div>
</div>