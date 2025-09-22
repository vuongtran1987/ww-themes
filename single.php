<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container mx-auto px-4 py-12">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
                <header class="entry-header mb-8">
                    <h1 class="entry-title text-4xl font-bold text-wisdom-purple mb-4 font-minion">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="entry-meta text-sm text-gray-600 font-avenir">
                        <span class="posted-on">
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline">
                            <?php _e('by', 'wisdom-waypoints'); ?> 
                            <span class="author vcard">
                                <?php the_author(); ?>
                            </span>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="cat-links">
                                <?php _e('in', 'wisdom-waypoints'); ?> 
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail mb-8">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg shadow-lg')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content prose prose-lg max-w-none font-minion">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer mt-8 pt-8 border-t border-gray-200">
                    <?php if (has_tag()) : ?>
                        <div class="tags-links mb-4">
                            <strong><?php _e('Tags:', 'wisdom-waypoints'); ?></strong>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'wisdom-waypoints'),
                        'after'  => '</div>',
                    ));
                    ?>
                </footer>
            </article>

            <?php
            // Navigation between posts
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . __('Previous:', 'wisdom-waypoints') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . __('Next:', 'wisdom-waypoints') . '</span> <span class="nav-title">%title</span>',
            ));

            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>