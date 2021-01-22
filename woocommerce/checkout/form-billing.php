<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;

$buyers_data = array('billing_first_name', 'billing_email', 'billing_phone');
$buyers_address = array('billing_custom_country', 'billing_custom_city', 'billing_custom_street', 'billing_custom_home', 'billing_custom_apartment', );

?>
<div class="woocommerce-billing-fields">

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

    <h3 class="checkout-title">Данные покупателя</h3>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

        $fields['billing_first_name'] += array('placeholder' => 'Имя');
        $fields['billing_email']['priority'] = 95;
        $fields['billing_email'] += array('placeholder' => 'E-mail');
        $fields['billing_phone'] += array('placeholder' => 'Телефон');

		foreach ( $fields as $key => $field ) {
		  unset($field['label']);
		  foreach ($buyers_data as $data) {
              if ($key == $data) {
                  woocommerce_form_field($key, $field, $checkout->get_value($key));
              }
          }
		}
		?>
	</div>

    <h3 class="checkout-title">Адрес покупателя</h3>

    <div class="woocommerce-billing-fields__field-wrapper">
        <?php
        foreach ( $fields as $key => $field ) {
            unset($field['label']);
            foreach ($buyers_address as $address) {
                if ($key == $address) {
                    woocommerce_form_field($key, $field, $checkout->get_value($key));
                }
            }
        }
        ?>
    </div>

  <!--<pre>
    <?/*print_r($fields);*/?>
  </pre>-->

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
