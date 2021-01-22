<?php
/**
 * Template name: Главная
 */

get_header();



?>


<section class="collection" id="collection">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title collection-title">
                    <?= $redux['home-collection-title']; ?>
                </h2>
            </div>

        </div>

            <?php

            echo do_shortcode('[recent_products per_page="3"]');

            ?>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-clear">
                    <?= $redux['home-collection-link']; ?>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="quality" id="quality">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title quality-title">
                    <?= $redux['home-advantage-title']; ?>
                </h2>
            </div>
            <div class="col-12 mb-4 col-md-6 mb-lg-0 col-lg-4">
                <div class="quality-item">
                    <div class="quality-item__img">
                        <img src="<?= $redux['home-advantage-quality-img']['url']; ?>">
                    </div>
                    <div class="quality-item__title">
                        <?= $redux['home-advantage-quality-title']; ?>
                    </div>
                    <p class="section-txt quality-item__txt">
                        <?= $redux['home-advantage-quality-txt']; ?>
                    </p>
                </div>
            </div>
            <div class="col-12 mb-4 col-md-6 mb-lg-0 col-lg-4">
                <div class="quality-item">
                    <div class="quality-item__img">
                        <img src="<?= $redux['home-advantage-speed-img']['url']; ?>">
                    </div>
                    <div class="quality-item__title">
                        <?= $redux['home-advantage-speed-title']; ?>
                    </div>
                    <p class="section-txt quality-item__txt">
                        <?= $redux['home-advantage-speed-txt']; ?>
                    </p>
                </div>
            </div>
            <div class="col-12 mb-4 col-md-6 mb-lg-0 col-lg-4">
                <div class="quality-item">
                    <div class="quality-item__img">
                        <img src="<?= $redux['home-advantage-respons-img']['url']; ?>">
                    </div>
                    <div class="quality-item__title">
                        <?= $redux['home-advantage-respons-title']; ?>
                    </div>
                    <p class="section-txt quality-item__txt">
                        <?= $redux['home-advantage-respons-txt']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="command">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title command-title">
                    <?= $redux['home-command-title']; ?>
                </h2>
            </div>
            <div class="col-lg-8 col-xl-9">
                <ul class="command-slides">
                    <?php
                    $command_slides = $redux['home-command-slides'];
                    foreach ($command_slides as $command_slide) { ?>
                        <li class="command-slides__item">
                            <img src="<?= $command_slide['image'] ?>">
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="command-content">
                    <h5 class="command-content__title">
                        <?= $redux['home-command-content-title']; ?>
                    </h5>
                    <div class="command-desc">
                        <?= $redux['home-command-content-txt']; ?>
                        <a href="<?= get_page_link(17); ?>" class="command-desc__lick">
                            <?= $redux['home-command-content-link']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer();