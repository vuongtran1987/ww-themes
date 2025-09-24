<?php
/**
 * Template Name: Home Page
 * 
 * Custom homepage template with banner and 4 editable boxes
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Banner Section -->
        <section class="hero-banner relative w-full overflow-hidden">
            <?php
            $banner_type = get_field('banner_type') ?: 'image';
            $banner_video = get_field('banner_video');
            $banner_height = get_field('banner_height') ?: '500';
            
            if ($banner_type === 'video' && $banner_video) :
            ?>
                <!-- Video Banner -->
                <div class="video-banner relative w-full" style="height: <?php echo esc_attr($banner_height); ?>px;">
                    <video 
                        class="absolute inset-0 w-full h-full object-cover" 
                        autoplay 
                        muted 
                        loop 
                        playsinline
                    >
                        <source src="<?php echo esc_url($banner_video['url']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <!-- Video Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                    
                    <!-- Video Content -->
                    <?php if (get_field('banner_title') || get_field('banner_subtitle')) : ?>
                        <div class="absolute inset-0 flex items-center justify-center text-center text-white z-10">
                            <div class="max-w-4xl px-4">
                                <?php if (get_field('banner_title')) : ?>
                                    <h1 class="text-4xl md:text-6xl font-bold mb-4 font-minion">
                                        <?php echo esc_html(get_field('banner_title')); ?>
                                    </h1>
                                <?php endif; ?>
                                
                                <?php if (get_field('banner_subtitle')) : ?>
                                    <p class="text-xl md:text-2xl font-avenir">
                                        <?php echo esc_html(get_field('banner_subtitle')); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
            <?php else : ?>
                <!-- Image Banner -->
                <div class="image-banner relative w-full" style="height: <?php echo esc_attr($banner_height); ?>px;">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array(
                            'class' => 'absolute inset-0 w-full h-full object-cover'
                        )); ?>
                    <?php else : ?>
                        <div class="absolute inset-0 bg-gradient-to-r from-wisdom-purple to-wisdom-teal"></div>
                    <?php endif; ?>
                    
                    <!-- Image Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                    
                    <!-- Image Content -->
                    <?php if (get_field('banner_title') || get_field('banner_subtitle')) : ?>
                        <div class="absolute inset-0 flex items-center justify-center text-center text-white z-10">
                            <div class="max-w-4xl px-4">
                                <?php if (get_field('banner_title')) : ?>
                                    <h1 class="text-4xl md:text-6xl font-bold mb-4 font-minion">
                                        <?php echo esc_html(get_field('banner_title')); ?>
                                    </h1>
                                <?php endif; ?>
                                
                                <?php if (get_field('banner_subtitle')) : ?>
                                    <p class="text-xl md:text-2xl font-avenir">
                                        <?php echo esc_html(get_field('banner_subtitle')); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- 4 Boxes Section -->
        <section class="content-boxes py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    
                    <!-- Box 1: Getting Started -->
                    <div class="content-box bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="box-header bg-getting-started h-12 flex items-center justify-center">
                            <h3 class="text-white font-black text-sm tracking-wider font-avenir uppercase">
                                <?php echo esc_html(get_field('box1_title') ?: 'Getting Started'); ?>
                            </h3>
                        </div>
                        <div class="box-content p-8">
                            <?php if (get_field('box1_content')) : ?>
                                <div class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                                    <?php echo wp_kses_post(get_field('box1_content')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('box1_link_text') && get_field('box1_link_url')) : ?>
                                <a href="<?php echo esc_url(get_field('box1_link_url')); ?>" 
                                   class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                                    <?php echo esc_html(get_field('box1_link_text')); ?>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Box 2: Latest News -->
                    <div class="content-box bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="box-header bg-latest-news h-12 flex items-center justify-center">
                            <h3 class="text-white font-black text-sm tracking-wider font-avenir uppercase">
                                <?php echo esc_html(get_field('box2_title') ?: 'Latest News'); ?>
                            </h3>
                        </div>
                        <div class="box-content p-8">
                            <?php if (get_field('box2_content')) : ?>
                                <div class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                                    <?php echo wp_kses_post(get_field('box2_content')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('box2_link_text') && get_field('box2_link_url')) : ?>
                                <a href="<?php echo esc_url(get_field('box2_link_url')); ?>" 
                                   class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                                    <?php echo esc_html(get_field('box2_link_text')); ?>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Box 3: Events -->
                    <div class="content-box bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="box-header bg-events h-12 flex items-center justify-center">
                            <h3 class="text-white font-black text-sm tracking-wider font-avenir uppercase">
                                <?php echo esc_html(get_field('box3_title') ?: 'Events'); ?>
                            </h3>
                        </div>
                        <div class="box-content p-8">
                            <?php if (get_field('box3_content')) : ?>
                                <div class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                                    <?php echo wp_kses_post(get_field('box3_content')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('box3_link_text') && get_field('box3_link_url')) : ?>
                                <a href="<?php echo esc_url(get_field('box3_link_url')); ?>" 
                                   class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                                    <?php echo esc_html(get_field('box3_link_text')); ?>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Box 4: Courses -->
                    <div class="content-box bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="box-header bg-courses h-12 flex items-center justify-center">
                            <h3 class="text-white font-black text-sm tracking-wider font-avenir uppercase">
                                <?php echo esc_html(get_field('box4_title') ?: 'Courses'); ?>
                            </h3>
                        </div>
                        <div class="box-content p-8">
                            <?php if (get_field('box4_content')) : ?>
                                <div class="font-minion text-base leading-relaxed text-gray-800 mb-8">
                                    <?php echo wp_kses_post(get_field('box4_content')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('box4_link_text') && get_field('box4_link_url')) : ?>
                                <a href="<?php echo esc_url(get_field('box4_link_url')); ?>" 
                                   class="inline-flex items-center gap-2 text-wisdom-red font-minion text-xs tracking-wider hover:text-red-800 transition-colors">
                                    <?php echo esc_html(get_field('box4_link_text')); ?>
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Additional Content -->
        <?php if (get_the_content()) : ?>
            <section class="additional-content py-12">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto prose prose-lg font-minion">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>