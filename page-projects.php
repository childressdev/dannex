<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="intro-content">
      <?php the_field('page_intro'); ?>
    </section>
    <section id="projects">
      <div class="row">
        <?php 
          $projects = new WP_Query(array('post_type' => 'dannex_projects', 
                                          'posts_per_page' => 6,
                                          'post_status' => 'publish',
                                          'paged' => get_query_var('paged')));
          if($projects->have_posts()): $i=0; while($projects->have_posts()): $projects->the_post(); ?>
            <div class="col-sm-4">
              <div class="project-card">
                <img src="<?php echo get_field('project_featured_image') ? get_field('project_featured_image') : get_stylesheet_directory_uri() . '/images/house-stone-3-car-garage_325.jpg'; ?>" class="img-responsive center-block" alt="" />
                <div class="project-card-caption">
                  <h2><?php the_title(); ?></h2>
                  <p><?php the_field('project_short_description'); ?></p>
                  <a href="<?php the_permalink(); ?>" class="btn-clear">View Project</a>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; endif; ?>
      </div>
      <?php  wp_pagenavi(array('query' => $projects)); ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>