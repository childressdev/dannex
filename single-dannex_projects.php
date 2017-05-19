<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section id="mainContent">
      <div class="go-back">
        <a href="#" class="btn-clear">Back</a>
      </div>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <h3><?php the_field('project_short_description'); ?></h3>
        <hr />
        <?php the_content(); ?>
      <div class="post-nav">
        <?php previous_post_link('%link', 'Prev Project'); ?>
        <?php next_post_link('%link', 'Next Project'); ?>
      </div>
      <?php endwhile; endif; ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>