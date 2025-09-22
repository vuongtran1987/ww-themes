<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container mx-auto px-4 py-12">
        <header class="page-header mb-12 text-center">
            <h1 class="page-title text-4xl font-bold text-wisdom-purple mb-4 font-minion">
                <?php
                printf(
                    __('Search Results for: %s', 'wisdom-waypoints'),
                    '<span class="text-wisdom-red">' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-8 pb-8 border-b border-gray-200 last:border-b-0'); ?>>
                        <header class="entry-header mb-4">
                            <h2 class="entry-title text-2xl font-bold text-wisdom-purple mb-2 font-minion">
                                <a href="<?php the_permalink(); ?>" class="hover:text-wisdom-red transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="entry-meta text-sm text-gray-600 font-avenir">
                                <span class="posted-on"><?php echo get_the_date(); ?></span>
                                <span class="post-type ml-2 px-2 py-1 bg-gray-100 rounded text-xs">
                                    <?php echo get_post_type(); ?>
                                </span>
                                <?php if (has_category()) : ?>
                                    <span class="cat-links ml-2">
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <div class="entry-summary font-minion text-gray-700 mb-4">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-wisdom-red font-minion text-sm tracking-wider hover:text-red-800 transition-colors">
                                <?php _e('Read More', 'wisdom-waypoints'); ?>
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </footer>
                    </article>
                <?php endwhile; ?>

                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('Previous', 'wisdom-waypoints'),
                    'next_text' => __('Next', 'wisdom-waypoints'),
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="no-results text-center py-12">
                <h2 class="text-2xl font-bold text-wisdom-purple mb-4 font-minion">
                    <?php _e('Nothing Found', 'wisdom-waypoints'); ?>
                </h2>
                <p class="text-gray-600 font-avenir mb-8">
                    <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wisdom-waypoints'); ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>