<?php
/**
 * Template name: Контакты
 */

get_header(); ?>

<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-map">
                    <?= do_shortcode('[wpgmza id="1"]'); ?>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="contact-title"><?= $redux['contact-tel-title']; ?></div>
                <div class="contact-txt"><?= $redux['contact-tel-txt']; ?></div>
            </div>
            <div class="col-lg-3 col-xl-3">
                <div class="contact-title"><?= $redux['contact-email-title']; ?></div>
                <div class="contact-txt"><?= $redux['contact-email-txt']; ?></div>
            </div>
            <div class="col-lg-5 col-xl-6">
                <div class="contact-title"><?= $redux['contact-address-title']; ?></div>
                <div class="contact-txt"><?= $redux['contact-address-txt']; ?></div>
            </div>
        </div>
        <div class="contact-form">
            <h4 class="contact-form__title"><?= $redux['contact-form-title'] ?></h4>
            <div class="contact-form__form">
                <?= do_shortcode('[contact-form-7 id="154" title="contact_form"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();