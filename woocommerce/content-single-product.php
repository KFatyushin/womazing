<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $wpdb;

//
$options_product_attrs = $product->attributes;

// заголовки
$options_product_titles = $wpdb->get_results('SELECT * FROM `wp_woocommerce_attribute_taxonomies`');


// массив для цветов (далее не нужен)
$options_product_object = $wpdb->get_results('SELECT * FROM `wp_termmeta`');



if ($product->attributes['pa_color']) {
    // id для цветов
    $options_product_active = $product->attributes['pa_color']->get_options();

    // ЗАПИСЫВАЕМ ЦВЕТА В МАССИВ
    foreach ($options_product_object as $obj_item) {
        if ($obj_item->meta_key == 'color_pa') {
            $options_product_color[] = $obj_item;
        }
    }
    foreach ($options_product_active as $p_item) {
        foreach ($options_product_color as $c_item) {
            if ($p_item == $c_item->term_id) {
                $color_products[] = $c_item->meta_value;
            }
        }
    }
}


/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$product_single_image_size = apply_filters( 'content-single-product-thumb', $size ); ?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row product-wrapper', $product ); ?>>



  <div class="col-md-6">
    <div class="product-img">
      <?= $product->get_image($product_single_image_size); ?>
    </div>
  </div>



  <div class="col-md-6">
    <div class="product-wrap">
      <div class="product-price">
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
      </div>

      <? foreach ($options_product_attrs as $product_attr) :

          $product_id = $product_attr->get_id();
          $product_slag = $product_attr->get_name();
          $product_items = $product->get_variation_attributes()[$product_slag];
          ?>

        <div class="product-variable">
          <div class="product-variable__title product-variable__title-<?= $product_slag; ?>">
            Выберите
            <? foreach ($options_product_titles as $options_product_title) {

                $title_id = $options_product_title->attribute_id;
                $title = $options_product_title->attribute_label;
                echo ($product_id == $title_id ? $title : '');
            } ?>
          </div>
          <ul class="product-variable__list">
              <? if ($product_slag == 'pa_color') :

                  foreach (array_combine($product_items, $color_products) as $value => $item) : ?>
                      <li class="product-variable__item">
                            <label style="background: <?= $item; ?>" class="<?= ($product_slag == 'pa_color') ? 'btn-' . $product_slag : 'small-btn'; ?>" for="<?= $product_slag . '_v_' . $value . $product->get_id(); ?>"></label>
                      </li>
                  <? endforeach; ?>

              <? else :

                  foreach ($product_items as $item) : ?>
                      <li class="product-variable__item">
                          <label class="<?= ($product_slag == 'pa_color') ? 'btn-' . $product_slag : 'small-btn'; ?>" for="<?= $product_slag . '_v_' . $item . $product->get_id(); ?>"><?= $item; ?></label>
                      </li>
                  <? endforeach; ?>

              <? endif; ?>
          </ul>
        </div>


      <? endforeach; ?>

        <?php woocommerce_template_single_add_to_cart(); ?>
    </div>
  </div>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
//	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
//		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
//	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<? woocommerce_output_related_products() ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
