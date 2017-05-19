<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section id="mainContent">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <hr />
        <?php if(is_single()): ?>
          <?php the_content(); ?>
        <?php else: ?>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="btn-clear">Read More</a>
        <?php endif; ?>
      <?php endwhile; else: ?>
        <p>Sorry, the page could not be found.</p>
      <?php endif; ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>