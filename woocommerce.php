<?php
/**
 * WooCommerce Template
 * 
 * This template is used for all WooCommerce pages
 */

get_header(); ?>

<main id="main" class="site-main woocommerce-main">
    <div class="container mx-auto px-4 py-12">
        
        <?php if (function_exists('woocommerce_breadcrumb')) : ?>
            <div class="woocommerce-breadcrumb mb-8">
                <?php woocommerce_breadcrumb(); ?>
            </div>
        <?php endif; ?>

        <?php woocommerce_content(); ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>