<?php
/**
 * Template name: Заказ принят
 *
 */

get_header(); ?>

<section class="order-acc">
    <div class="container">
        <div class="order-acc-wrap">
            <div class="order-acc-left">
                <div class="order-acc-left__icon-wrap">
                    <div class="order-acc-left__icon-check"></div>
                </div>
                <div class="order-acc-left__content">
                    <div class="order-acc-left__title">Заказ успешно оформлен</div>
                    <div class="order-acc-left__txt">Мы свяжемся с вами в ближайшее время!</div>
                </div>
            </div>
            <div class="order-acc-btn">
                <a href="<?= esc_url( home_url( '/' ) ); ?>" class="btn btn-clear">Перейти на главную</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
