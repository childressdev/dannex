<?php get_header(); ?>
<main id="main">
  <section class="flourished-caption" style="background-image:url(<?php echo get_field('first_section_background_image') ? get_field('first_section_background_image') : get_stylesheet_directory_uri() . '/images/house-colonial-white-fence.jpg'; ?>);">
    <div class="container">
      <div class="caption-wrapper">
        <div class="caption">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flourish-border-top.png" class="img-responsive center-block" alt="" />
          <h1><?php the_field('first_section_title'); ?></h1>
          <p><?php the_field('first_section_content'); ?></p>
          <a href="<?php the_field('first_section_link'); ?>" class="btn-clear">Learn More</a>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flourish-border-bottom.png" class="img-responsive center-block" alt="" />
        </div>
      </div>
    </div>
  </section>
  <section id="customBuilds" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/floorplan-bg.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <div class="caption-wrapper">
            <div class="caption">
              <h1><?php the_field('second_section_title'); ?></h1>
              <?php the_field('second_section_content'); ?>
            </div>
          </div>
        </div>
        <div class="col-sm-7">
          <div class="caption-wrapper">
            <div class="caption">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blueprint-rolls.png" class="img-responsive center-block" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="flourished-caption" style="background-image:url(<?php echo get_field('third_section_background_image') ? get_field('third_section_background_image') : get_stylesheet_directory_uri() . 'images/house-addition.jpg'; ?>);">
    <div class="container">
      <div class="caption-wrapper">
        <div class="caption">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flourish-border-top.png" class="img-responsive center-block" alt="" />
          <h1><?php the_field('third_section_title'); ?></h1>
          <p><?php the_field('third_section_content'); ?></p>
          <a href="<?php the_field('third_section_link'); ?>" class="btn-clear">Learn More</a>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flourish-border-bottom.png" class="img-responsive center-block" alt="" />
        </div>
      </div>
    </div>
  </section>
  <section id="remodel">
    <div class="remodel-title">
      <h1><?php the_field('remodel_section_title'); ?></h1>
    </div>
    <div class="remodel-img-cards" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/couple-kitchen-drawing.jpg);"></div>
    <div class="container container-sm-height">
      <div class="row row-sm-height cards">
        <div class="col-sm-4 col-sm-height">
          <div class="remodel-card">
            <h2><?php the_field('remodelling_card_1_title'); ?></h2>
            <p><?php the_field('remodelling_card_1_content'); ?></p>
            <a href="<?php the_field('remodelling_card_1_link'); ?>" class="btn-big">LEARN MORE</a>
          </div>
        </div>
        <div class="col-sm-4 col-sm-height">
          <div class="remodel-card">
            <h2><?php the_field('remodelling_card_2_title'); ?></h2>
            <p><?php the_field('remodelling_card_2_content'); ?></p>
            <a href="<?php the_field('remodelling_card_2_link'); ?>" class="btn-big">LEARN MORE</a>
          </div>
        </div>
        <div class="col-sm-4 col-sm-height">
          <div class="remodel-card">
            <h2><?php the_field('remodelling_card_3_title'); ?></h2>
            <p><?php the_field('remodelling_card_3_content'); ?></p>
            <a href="<?php the_field('remodelling_card_3_link'); ?>" class="btn-big">LEARN MORE</a>
          </div>
        </div>
      </div>
    </div>        
  </section>
  <section class="project-list">
    <div class="container">
      <h1><?php the_field('current_projects_title'); ?></h1>
      <?php
        $recent_projects = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => 3, 'post_status', 'publish'));
        if($recent_projects->have_posts()): ?>
          <div class="row">
            <?php while($recent_projects->have_posts()): $recent_projects->the_post(); ?>
              <div class="col-sm-4">
                <div class="project-card">
                  <img src="images/house-stone-3-car-garage.jpg" class="img-responsive center-block" alt="" />
                  <div class="project-card-caption">
                    <h2>House Name</h2>
                    <p>Short description of project to go here to tell about the build and what was accomplished.</p>
                    <a href="#" class="btn-clear">View Project</a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>