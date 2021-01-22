<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<p class="section-txt number-goods-bottom">
	<?php
	// phpcs:disable WordPress.Security
	if ( 1 === intval( $total ) ) {
		_e( 'Showing the single result', 'woocommerce' );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );

        if ($current == 1) {
          $num_page = '';
        } elseif ($first == $last) {
          $num_page = '';
        } else {
          $num_page = '%1$d&ndash;';
        }

		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Показано: ' . $num_page . '%2$d из %3$d товаров', 'Показано: ' . $num_page . '%2$d из %3$d товаров', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	// phpcs:enable WordPress.Security
	?>
</p>
