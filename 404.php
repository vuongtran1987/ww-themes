<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container mx-auto px-4 py-12">
        <div class="error-404 not-found text-center max-w-2xl mx-auto">
            <header class="page-header mb-8">
                <h1 class="page-title text-6xl font-bold text-wisdom-red mb-4 font-minion">404</h1>
                <h2 class="text-3xl font-bold text-wisdom-purple mb-4 font-minion">
                    <?php _e('Oops! That page can\'t be found.', 'wisdom-waypoints'); ?>
                </h2>
            </header>

            <div class="page-content">
                <p class="text-lg text-gray-600 font-avenir mb-8">
                    <?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wisdom-waypoints'); ?>
                </p>

                <div class="search-form mb-12">
                    <?php get_search_form(); ?>
                </div>

                <div class="helpful-links grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="widget">
                        <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                            <?php _e('Recent Posts', 'wisdom-waypoints'); ?>
                        </h3>
                        <ul class="recent-posts list-none">
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 5,
                                'post_status' => 'publish'
                            ));
                            foreach ($recent_posts as $post) :
                            ?>
                                <li class="mb-2">
                                    <a href="<?php echo get_permalink($post['ID']); ?>" class="text-wisdom-red hover:text-red-800 transition-colors font-avenir">
                                        <?php echo $post['post_title']; ?>
                                    </a>
                                </li>
                            <?php endforeach; wp_reset_query(); ?>
                        </ul>
                    </div>

                    <div class="widget">
                        <h3 class="widget-title text-xl font-bold text-wisdom-purple mb-4 font-minion">
                            <?php _e('Categories', 'wisdom-waypoints'); ?>
                        </h3>
                        <ul class="categories list-none">
                            <?php
                            $categories = get_categories(array('number' => 10));
                            foreach ($categories as $category) :
                            ?>
                                <li class="mb-2">
                                    <a href="<?php echo get_category_link($category->term_id); ?>" class="text-wisdom-red hover:text-red-800 transition-colors font-avenir">
                                        <?php echo $category->name; ?> (<?php echo $category->count; ?>)
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="back-home mt-12">
                    <a href="<?php echo home_url(); ?>" class="inline-flex items-center gap-2 bg-wisdom-purple text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors font-avenir">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <?php _e('Back to Home', 'wisdom-waypoints'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>