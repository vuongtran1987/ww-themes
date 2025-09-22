<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container mx-auto px-4 py-12">
        <header class="page-header mb-12 text-center">
            <?php
            the_archive_title('<h1 class="page-title text-4xl font-bold text-wisdom-purple mb-4 font-minion">', '</h1>');
            the_archive_description('<div class="archive-description text-lg text-gray-600 font-avenir">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="posts-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <header class="entry-header mb-4">
                                <h2 class="entry-title text-xl font-bold text-wisdom-purple mb-2 font-minion">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-wisdom-red transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="entry-meta text-sm text-gray-600 font-avenir">
                                    <span class="posted-on"><?php echo get_the_date(); ?></span>
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
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous', 'wisdom-waypoints'),
                'next_text' => __('Next', 'wisdom-waypoints'),
            ));
            ?>

        <?php else : ?>
            <div class="no-posts text-center py-12">
                <h2 class="text-2xl font-bold text-wisdom-purple mb-4 font-minion">
                    <?php _e('Nothing Found', 'wisdom-waypoints'); ?>
                </h2>
                <p class="text-gray-600 font-avenir">
                    <?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'wisdom-waypoints'); ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>