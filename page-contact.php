<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section id="contact">
      <div class="row">
        <div class="col-sm-6 col-sm-push-6">
          <div class="contact-info">
            <p><strong>Email</strong><br /><?php the_field('email', 'option'); ?></p>
            <p><strong>Phone</strong><br /><?php the_field('phone', 'option'); ?></p>
            <p><strong>Address</strong><br /><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
          </div>
        </div>
        <div class="col-sm-6 col-sm-pull-6">
          <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
        </div>
      </div>
      <img src="images/google-map-placeholder.jpg" class="img-responsive center-block" style="margin-top:40px;" alt="" />
    </section>
  </div>
</main>
<?php get_footer(); ?>