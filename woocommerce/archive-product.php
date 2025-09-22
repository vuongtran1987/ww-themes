<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<main id="main" class="site-main woocommerce-main">
    <div class="container mx-auto px-4 py-12">
        
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <header class="woocommerce-products-header mb-8">
                <h1 class="woocommerce-products-header__title page-title text-3xl font-bold text-wisdom-purple mb-4 font-minion">
                    <?php woocommerce_page_title(); ?>
                </h1>
                
                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 *
                 * @hooked woocommerce_taxonomy_archive_description - 10
                 * @hooked woocommerce_product_archive_description - 10
                 */
                do_action('woocommerce_archive_description');
                ?>
            </header>
        <?php endif; ?>

        <?php
        if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('is_shortcode')) {
                $columns = absint(wc_get_loop_prop('columns'));
            } else {
                $columns = wc_get_default_products_per_row();
            }

            while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
        }
        ?>
        
    </div>
</main>

<?php
get_footer('shop');
?>