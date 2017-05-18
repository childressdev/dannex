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
        <a href="#" class="btn-clear" rel="prev">Prev Project</a>
        <a href="#" class="btn-clear" rel="next">Next Project</a>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>