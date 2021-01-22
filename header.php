<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package womazing
 */

global $redux;

global $product;

global $woocommerce;
$cart_url = $woocommerce->cart->get_cart_url();

$num_product = WC()->cart->get_cart_contents_count();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<header class="header <?php if (is_front_page()) echo 'header-home'; ?>" id="header">
  <div class="header-nav-bar default" id="menu-head">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-8 col-lg-3">
              <?php the_custom_logo(); ?>
        </div>
        <div class="col-2 order-first col-lg-6 order-lg-0 position-static">
          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>
  
          <?php
            wp_nav_menu(array(
                'theme_location'    => 'head-menu',
                'container'         => 'nav',
                'container_class'   => 'menu menu_mobile',
                'menu_class'        => 'menu__list',
            ));
          ?>
  
        </div>
        <div class="col-2 col-lg-3 d-flex align-items-center">
          <div class="request-call">
            <a href="#" class="request-call__btn">
              <img class="img-svg" src="<?= $redux['header-navbar-phone-icon']['url']; ?>">
            </a>
            <a href="tel:<?= preg_replace('![^0-9+]!', '', $redux['header-navbar-phone-title'])?>" class="request-call__num">
                <?= $redux['header-navbar-phone-title']; ?>
            </a>
          </div>
          <div class="shopping-bags ml-auto">
            <a href="<?= $cart_url; ?>">
              <img src="<?= $redux['header-navbar-basket-icon']['url']; ?>">
              <?php if ($num_product) { ?>
                  <span class="shopping-bags__num-product"><?= $num_product; ?></span>
              <?php } ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php if (is_front_page()) { ?>
    <div class="container">
      <div class="header-content">
        <div class="row">
          <div class="col-12 col-md-7">
            <ul class="header-slides">
              <?php
              $header_slides = $redux['header-content-slides'];
              foreach ($header_slides as $slide) { ?>
                <li class="header-slides__item">
                  <h1 class="main-title header-slides__title">
                    <?= $slide['title']?>
                  </h1>
                  <div class="header-slides__wrapper">
                    <p class="header-slides__txt">
                      <?= $slide['description'] ?>
                    </p>
                    <div class="header-slides__btn-wrapper" id="header-btn-anchor">
                      <a href="#collection" class="header-slides__go-down-btn">
                        <img src="<?= $redux['header-content-goDownBTN']['url']; ?>">
                      </a>
                      <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn header-slides__link-shop">
                        Открыть магазин
                      </a>
                    </div>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-12 col-md-5">
            <ul class="header-img-slides">
              <?php foreach ($header_slides as $slide) { ?>
                <li class="header-img-slides__item">
                  <img src="<?= $slide['image']; ?>">
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    <?php } else { ?>
    <div class="container">
      <div class="header-page <?= is_product() ? 'header-page-product' : ''; ?> ">
        <div class="row">
          <div class="col-12">
            <h1 class="main-title">
              <?= (!is_woocommerce() || is_product()) ? get_the_title() : woocommerce_page_title(); ?>

            </h1>

            <?= (!is_woocommerce()) ? womazing_get_breadcrumbs() : woocommerce_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php }?>
</header>

