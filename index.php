<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container mx-auto px-4 py-12">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
                <header class="entry-header mb-8">
                    <h1 class="entry-title text-4xl font-bold text-wisdom-purple mb-4 font-minion">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail mb-8">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg shadow-lg')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content prose prose-lg max-w-none font-minion">
                    <?php the_content(); ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'wisdom-waypoints'),
                    'after'  => '</div>',
                ));
                ?>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section mt-12">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>