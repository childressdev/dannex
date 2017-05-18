    <?php
      $most_recent_project = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => 1, 'post_status' => 'publish'));
      if($most_recent_project->have_posts()): while($most_recent_project->have_posts()): $most_recent_project->the_post(); ?>
        <section class="testimonial">
          <div class="container">
            <div class="caption-wrapper">
              <div class="caption">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/five-stars.png" class="img-responsive center-block" alt="" />
                <?php the_field('testimonial'); ?>
                <h4><?php the_field('testimonial_author'); ?></h4>
              </div>
            </div>
          </div>
        </section>
    <?php endwhile; endif; ?>
    <?php if(have_rows('vendors', 'option')): ?>
      <section class="vendor-list">
        <div class="container">
          <h1>Our Vendors</h1>
          <ul class="vendors">
            <?php while(have_rows('vendors', 'option')): the_row(); ?>
              <li>
                <a href="<?php the_sub_field('vendor_link'); ?>"><img src="<?php the_sub_field('vendor_logo'); ?>" class="img-responsive center-block" alt="<?php the_sub_field('vendor_name'); ?>" /></a>
              </li>
            <?php endwhile; ?>
         </ul>
        </div>
      </section>
    <?php endif; ?>
    <section id="getStarted" style="background-image:url(<?php echo get_field('get_started_background_image', 'option') ? get_field('get_started_background_image', 'option') : get_stylesheet_directory_uri() . '/images/samples-with-gradient.jpg'; ?>);">
      <div class="container">
        <div class="caption-wrapper">
          <div class="caption">
            <h1><?php the_field('get_started_title'); ?></h1>
            <a href="<?php the_field('get_started_link'); ?>" class="btn-clear"><?php the_field('get_started_link_text'); ?></a>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dannex-construction-logo_230.png" class="img-responsive" alt="Dannex Construction Logo" />
          </div>
          <div class="col-sm-6">
            <div class="footer-nav-info">
              <ul class="footer-nav">
                <li><a href="<?php echo home_url('services'); ?>">Services</a></li>
                <li><a href="<?php echo home_url('portfolio'); ?>">Portfolio</a></li>
                <li><a href="<?php echo home_url('projects'); ?>">Projects</a></li>
                <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
              </ul>
              <hr />
              <p><?php the_field('email', 'option'); ?> &nbsp;&middot;&nbsp; <?php the_field('phone', 'option'); ?><br />&copy;<?php echo date('Y'); ?> Dannex Construction<br /><?php the_field('street_address', 'option'); ?></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="social">
              <?php if(get_field('facebook', 'option')): ?>
                <a href="<?php the_field('facebook', 'option'); ?>" class="facebook"></a>
              <?php endif; if(get_field('pinterest', 'option')): ?>
                <a href="<?php the_field('pinterest', 'option'); ?>" class="pinterest"></a>
              <?php endif; if(get_field('angies_list', 'option')): ?>
                <a href="<?php the_field('angies_list', 'option'); ?>" class="angies-list"></a>
              <?php endif; if(get_field('houzz', 'option')): ?>
                <a href="<?php the_field('houzz', 'option'); ?>" class="houzz"></a>
              <?php endif; if(get_field('bbb', 'option')): ?>
                <a href="<?php the_field('bbb', 'option'); ?>" class="bbb"></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <p class="childress">website created by <a href="https://childressagency.com">The Childress Agency</a></p>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>