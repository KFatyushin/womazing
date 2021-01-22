<?php
/**
 * Template name: О бренде
 */

get_header(); ?>

    <section class="about">
        <div class="container">
            <div class="row align-items-lg-center align-items-xl-start">
                <div class="col-md-5">
                    <div class="about-img">
                        <img src="<?= $redux['about-content-img-1']['url']; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about-content-top">
                        <h3 class="about-title">
                            <?= $redux['about-content-title-1']; ?>
                        </h3>
                        <div class="about-desk">
                            <?= $redux['about-content-txt-1']; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="about-content-bottom">
                        <h3 class="about-title">
                            <?= $redux['about-content-title-2']; ?>
                        </h3>
                        <div class="about-desk">
                            <?= $redux['about-content-txt-2']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-img about-img_bottom">
                        <img src="<?= $redux['about-content-img-2']['url']; ?>">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn about-btn">Перейти в магизин</a>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();