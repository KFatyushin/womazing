<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package womazing
 */

global $redux;
?>

<footer class="footer" id="footer">
  <div class="container">
    <div class="row">
      <div class="position-static col-sm-6 col-md-4 col-lg-3">

        <?php the_custom_logo(); ?>

        <div class="footer-rights">
          <span class="footer-rights__txt">
            <?= $redux['footer-conf-rightsTXT']; ?>
          </span>
          <a href="<?= $redux['footer-conf-privacyTXT']['link']; ?>" class="footer-rights__link">
            <?= $redux['footer-conf-privacyTXT']['text']; ?>
          </a>
          <a href="<?= $redux['footer-conf-offerTXT']['link']; ?>" class="footer-rights__link">
            <?= $redux['footer-conf-offerTXT']['text']; ?>
          </a>
        </div>
      </div>
      <div class="order-first order-md-0 col-md-8 col-lg-6">

          <?php
          wp_nav_menu(array(
              'theme_location'    => 'footer-menu',
              'container'         => 'nav',
              'container_class'   => 'menu',
              'menu_class'        => 'menu__list',
          ));
          ?>

      </div>
      <div class="col-sm-6 col-md-12 col-lg-3">
        <div class="footer-message-wrapper">
          <div class="request-call">
            <a href="tel:<?= preg_replace('![^0-9+]!', '', $redux['footer-conf-phone'])?>" class="request-call__num">
              <?= $redux['footer-conf-phone']; ?>
            </a>
            <a href="mailto:<?= $redux['footer-conf-email']; ?>" class="request-call__mail"><?= $redux['footer-conf-email']; ?></a>
          </div>
          <ul class="footer-socials">
            <?php
            $socials = $redux['footer-conf-social'];
            foreach ($socials as $social) { ?>
              <li class="footer-socials__item">
                <a href="<?= $social['url']; ?>" class="footer-socials__instagram">
                  <img src="<?= $social['image']; ?>">
                </a>
              </li>
            <?php } ?>
          </ul>
          <div class="footer-payments">
            <img src="<?= $redux['footer-conf-payments']['url']; ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal-window">
  <div class="modal-window__wrapper">
    <div class="modal-window__title">
      Заказать обратный звонок
    </div>
    <form class="modal-window__form">
      <input type="text" name="modal-window__input" placeholder="Имя">
      <input type="email" name="modal-window__email" placeholder="E-mail">
      <input type="tel" name="modal-window__tel" placeholder="Телефон">
      <button type="submit" class="btn modal-window__btn">Заказать звонок</button>
    </form>
    <div class="modal-window__close"></div>
  </div>
  <div class="modal-window__overlay"></div>
</div>

<?php wp_footer();

global $post;

?>
<script>
    // ADD ARROWS FOR COMMAND SLIDES
    $('.command-slides .slick-prev').html("<img src='<?= $redux['header-content-goDownBTN']['url']; ?>' class='slick-arrow__img'>");
    $('.command-slides .slick-next').html("<img src='<?= $redux['header-content-goDownBTN']['url']; ?>' class='slick-arrow__img'>");

    svgConvector($('.slick-arrow img'));


    $('.product-categories').prepend("<li class='cat-item <?= is_shop() ? 'current-cat' : ''; ?>'><a href='<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>'>Все</a></li>");
</script>
</body>
</html>
