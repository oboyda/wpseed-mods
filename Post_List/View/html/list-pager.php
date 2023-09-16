<?php if($view->pages_max <= 1) return; ?>

<div class="<?php echo $view->getHtmlClass(); ?>">

    <?php if($view->has_page_chunks()): ?>
    
    <ul class="page-list ns">
        <?php 
        foreach($view->get_page_chunks() as $ci => $chunk): 
        if(in_array($view->get_paged(), $chunk)): 
        
            $chunk_last = count($chunk)-1;
            $chunk_page_prev = $chunk[0]-1;
            $chunk_page_next = $chunk[$chunk_last]+1;
            ?>

            <?php if($view->get_paged() > 1): ?>
            <li class="page page-prev">
                <a href="<?php echo get_pagenum_link($view->get_page_prev()); ?>" class="<?php echo $view->get_btn_class(); ?> icon-only" data-page="<?php echo $view->get_page_prev(); ?>">
                    <?php echo $view->get_btn_prev_icon_html(); ?>
                    <?php if($view->has_btn_prev_label()): ?><span class="label-text"><?php echo $view->get_btn_prev_label(); ?></span><?php endif; ?>
                </a>
            </li>
            <?php endif; ?>

            <?php if($ci > 0): ?>
                <?php if($view->has_show_first_last()): ?>
                <li class="page page-first">
                    <a href="<?php echo get_pagenum_link(1); ?>" class="<?php echo $view->get_btn_class(); ?>" data-page="1">1</a>
                </li>
                <?php endif; ?>

            <li class="page group-prev">
                <a href="<?php echo get_pagenum_link($chunk_page_prev); ?>" class="<?php echo $view->get_btn_class(); ?>" data-page="<?php echo $chunk_page_prev; ?>">...</a>
            </li>
            <?php endif; ?>
        
            <?php foreach($chunk as $page): 
                $active_class = ($page === $view->get_paged()) ? ' active' : '';
                ?>
            <li class="page<?php echo $active_class; ?>">
                <a href="<?php echo get_pagenum_link($page); ?>" class="<?php echo $view->get_btn_class(); ?>" data-page="<?php echo $page; ?>"><?php echo $page; ?></a>
            </li>
            <?php endforeach; ?>

            <?php if($ci+1 < $view->get_page_chunks_num()): ?>
            <li class="page group-next">
                <a href="<?php echo get_pagenum_link($chunk_page_next); ?>" class="<?php echo $view->get_btn_class(); ?>" data-page="<?php echo $chunk_page_next; ?>">...</a>
            </li>

                <?php if($view->has_show_first_last()): ?>
                <li class="page page-last">
                    <a href="<?php echo get_pagenum_link($view->pages_max); ?>" class="<?php echo $view->get_btn_class(); ?>" data-page="<?php echo $view->pages_max; ?>"><?php echo $view->pages_max; ?></a>
                </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($view->get_paged() < $view->pages_max): ?>
            <li class="page page-next">
                <a href="<?php echo get_pagenum_link($view->get_page_next()); ?>" class="<?php echo $view->get_btn_class(); ?> icon-only" data-page="<?php echo $view->get_page_next(); ?>">
                    <?php if($view->has_btn_next_label()): ?><span class="label-text"><?php echo $view->get_btn_next_label(); ?></span><?php endif; ?>
                    <?php echo $view->get_btn_next_icon_html(); ?>
                </a>
            </li>
            <?php endif; ?>

        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    
    <?php endif; ?>

</div>