<aside id="secondary" class="widget-area sidebar">
    
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        
        <!-- Default widgets when no widgets are added -->
        <div class="widget widget_search mb-8">
            <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php _e('Search', 'wisdom-waypoints'); ?>
            </h3>
            <?php get_search_form(); ?>
        </div>

        <div class="widget widget_recent_entries mb-8">
            <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php _e('Recent Posts', 'wisdom-waypoints'); ?>
            </h3>
            <ul class="recent-posts list-none space-y-2">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post) :
                ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']); ?>" class="text-wisdom-red hover:text-red-800 transition-colors font-avenir text-sm">
                            <?php echo $post['post_title']; ?>
                        </a>
                        <span class="block text-xs text-gray-500 font-avenir">
                            <?php echo get_the_date('', $post['ID']); ?>
                        </span>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>

        <div class="widget widget_categories mb-8">
            <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php _e('Categories', 'wisdom-waypoints'); ?>
            </h3>
            <ul class="categories list-none space-y-2">
                <?php
                $categories = get_categories(array('number' => 10));
                foreach ($categories as $category) :
                ?>
                    <li>
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="text-wisdom-red hover:text-red-800 transition-colors font-avenir text-sm">
                            <?php echo $category->name; ?>
                            <span class="text-gray-500">(<?php echo $category->count; ?>)</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="widget widget_archive mb-8">
            <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php _e('Archives', 'wisdom-waypoints'); ?>
            </h3>
            <ul class="archives list-none space-y-2">
                <?php wp_get_archives(array(
                    'type' => 'monthly',
                    'limit' => 12,
                    'format' => 'custom',
                    'before' => '<li>',
                    'after' => '</li>',
                    'show_post_count' => true,
                )); ?>
            </ul>
        </div>

        <div class="widget widget_tag_cloud mb-8">
            <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php _e('Tags', 'wisdom-waypoints'); ?>
            </h3>
            <div class="tagcloud">
                <?php wp_tag_cloud(array(
                    'smallest' => 12,
                    'largest' => 18,
                    'unit' => 'px',
                    'number' => 20,
                )); ?>
            </div>
        </div>

    <?php endif; ?>

</aside>