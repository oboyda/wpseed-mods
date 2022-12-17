<div class="<?php echo $view->getHtmlClass(); ?>" data-view="<?php echo $view->getName(); ?>">
    <div class="drop-area d-none d-lg-block">
        <span class="drop-label"><?php echo $view->get_drop_label(); ?></span>
        <span class="drop-summary"></span>
    </div>
    <input type="file" name="<?php echo $view->getInputName(); ?>" class="app-btn bc-grey5"<?php if($view->has_multiple()) echo ' multiple="true"'; ?> />
</div>