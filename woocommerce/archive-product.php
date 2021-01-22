<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

global $product;

$sorting_ars = array(
    'menu_order' => 'Исходная сортировка',
    'popularity' => 'По популярности',
    'rating'     => 'По рейтингу',
    'date'       => 'С последнего',
    'price'      => 'По возрастанию',
    'price-desc' => 'По убыванию',
);
$sorting_active = $_GET['orderby'];

if (!$sorting_active) {
    unset($sorting_ars['menu_order']);
}

$sorting_title = $sorting_active ? $sorting_ars[$sorting_active] : 'Cортировка товаров';

$shop_lick = get_permalink( wc_get_page_id( 'shop' ) );


?>
<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <? the_widget('WC_Widget_Product_Categories', array('hide_empty' => true, 'title' => false, 'orderby' => 'order')) ?>

            </div>
            <div class="col-12">
                <div class="section-txt number-goods-top">
                    <? woocommerce_result_count(); ?>
                    <div class="sorting">
                      <div class="sorting_title"><?= $sorting_title; ?></div>
                      <ul class="sorting__list">
                        <? foreach ($sorting_ars as $key => $item) : ?>
                        <? $sorting_link = ($key == 'menu_order') ? '' : '?orderby='. $key; ?>
                          <li class="sorting__item">
                            <a href="<?= $shop_lick . $sorting_link; ?>" class="sorting__link <?= ($key == $sorting_active) ? 'active' : ''; ?>">
                              <?= $item; ?>
                            </a>
                          </li>
                        <? endforeach; ?>
                      </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php

        woocommerce_product_loop_start();

        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'product' );
            }
        }

        woocommerce_product_loop_end();

        ?>

        <div class="row">
            <div class="col-12">
                <div class="section-txt number-goods-bottom">
                    <? woocommerce_result_count(); ?>
                </div>
            </div>
            <div class="col-12">
                <?

                if ( woocommerce_product_loop() ) {
                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }

                ?>
            </div>
        </div>
    </div>
</section>




<?php
/**
 * Hook: woocommerce_archive_description.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
//	do_action( 'woocommerce_archive_description' );
?>

<?php

/**
 * Hook: woocommerce_before_shop_loop.
 *
 * @hooked woocommerce_output_all_notices - 10
 * @hooked woocommerce_result_count - 20
 * @hooked woocommerce_catalog_ordering - 30
 */
//	do_action( 'woocommerce_before_shop_loop' );

get_footer( 'shop' );
