<?php get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section h-80 lg:h-96 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.jpg');">
    </section>

    <!-- Cards Section -->
    <section class="py-12 max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Getting Started Card -->
            <div class="wisdom-card bg-white border border-gray-200 shadow-lg overflow-hidden">
                <div class="wisdom-card-header bg-getting-started h-12 flex items-center justify-center text-white font-black text-sm tracking-wider font-avenir">
                    <?php _e('GETTING STARTED', 'wisdom-waypoints'); ?>
                </div>
                <div class="p-8 text-center">
                    <p class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                        <?php 
                        $getting_started_text = get_theme_mod('getting_started_text', 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et');
                        echo wp_kses_post($getting_started_text);
                        ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('getting_started_link', '#')); ?>" class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                        <?php _e('LOREM IPSUM HERE', 'wisdom-waypoints'); ?>
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Latest News Card -->
            <div class="wisdom-card bg-white border border-gray-200 shadow-lg overflow-hidden">
                <div class="wisdom-card-header bg-latest-news h-12 flex items-center justify-center text-white font-black text-sm tracking-wider font-avenir">
                    <?php _e('LATEST NEWS', 'wisdom-waypoints'); ?>
                </div>
                <div class="p-8 text-center">
                    <p class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                        <?php 
                        $latest_news_text = get_theme_mod('latest_news_text', 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et<br>omnis utem cus antiamenimo quamet');
                        echo wp_kses_post($latest_news_text);
                        ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('latest_news_link', '#')); ?>" class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                        <?php _e('LOREM IPSUM HERE', 'wisdom-waypoints'); ?>
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Events Card -->
            <div class="wisdom-card bg-white border border-gray-200 shadow-lg overflow-hidden">
                <div class="wisdom-card-header bg-events h-12 flex items-center justify-center text-white font-black text-sm tracking-wider font-avenir">
                    <?php _e('EVENTS', 'wisdom-waypoints'); ?>
                </div>
                <div class="p-8 text-center">
                    <p class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                        <?php 
                        $events_text = get_theme_mod('events_text', 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et');
                        echo wp_kses_post($events_text);
                        ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('events_link', '#')); ?>" class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                        <?php _e('LOREM IPSUM HERE', 'wisdom-waypoints'); ?>
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Courses Card -->
            <div class="wisdom-card bg-white border border-gray-200 shadow-lg overflow-hidden">
                <div class="wisdom-card-header bg-courses h-12 flex items-center justify-center text-white font-black text-sm tracking-wider font-avenir">
                    <?php _e('COURSES', 'wisdom-waypoints'); ?>
                </div>
                <div class="p-8 text-center">
                    <p class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                        <?php 
                        $courses_text = get_theme_mod('courses_text', 'Lorem ipsumNatinctur, simus eturit quam<br>que con nate omniendem esequi sam et<br>omnis utem cus antiamenimo quamet');
                        echo wp_kses_post($courses_text);
                        ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('courses_link', '#')); ?>" class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                        <?php _e('LOREM IPSUM HERE', 'wisdom-waypoints'); ?>
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>