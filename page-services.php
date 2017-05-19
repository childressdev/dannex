<?php get_header(); ?>
<main id="main">
  <section class="intro-content">
    <div class="container">
      <?php the_field('page_intro'); ?>
    </div>
  </section>
  <section id="serviceList">
    <div class="container-fluid container-sm-height">
      <?php
        $services = new WP_Query(array('post_type' => 'dannex_services', 'posts_per_page' => -1, 'post_status' => 'publish'));
        if($services->have_posts()): $i=1; while($services->have_posts()): $services->the_post(); ?>
          <div class="row row-sm-height">
            <div class="col-sm-6 col-sm-height service-link-wrapper<?php if($i%2==0){ echo ' col-sm-push-6'; } ?>" style="background-image:url(<?php the_field('service_list_background_image'); ?>); <?php the_field('service_list_background_image_css'); ?>">
              <div class="service-link">
                <div class="caption-wrapper">
                  <div class="caption">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-sm-height<?php if($i%2==0){ echo ' col-sm-pull-6'; } ?>">
              <div class="service-intro">
                <h3><?php the_field('service_list_intro'); ?></h3>
                <?php the_field('service_list_content'); ?>
                <a href="<?php the_permalink(); ?>" class="btn-clear">Learn More</a>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>