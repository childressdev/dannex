<?php get_header(); ?>
<main id="main">
  <section class="intro-content">
    <div class="container">
      <?php the_field('page_intro_content'); ?>
    </div>
  </section>
  <section id="serviceList">
    <div class="container-fluid container-sm-height">
      <?php if(have_rows('text_image_section')): $i=1; while(have_rows('text_image_section')): the_row(); ?>
        <div class="row row-sm-height">
          <div class="col-sm-6 col-sm-height service-link-wrapper<?php if($i%2==0){ echo ' col-sm-push-6'; } ?>" style="background-image:url(<?php the_sub_field('section_image'); ?>);<?php the_sub_field('section_image_css'); ?>"></div>
          <div class="col-sm-6 col-sm-height<?php if($i%2==0){ echo ' col-sm-pull-6'; } ?>">
            <div class="service-intro">
              <?php the_field('section_content'); ?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; endif; ?>
    </div>
  </section>
  <section id="portfolioLink">
    <div class="container">
      <h2>See our current and most recent projects</h2>
      <a href="<?php echo home_url('portfolio'); ?>" class="btn-clear">View Portfolio</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>