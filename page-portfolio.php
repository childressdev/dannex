<?php get_header(); ?>
<main id="main">
  <section class="intro-content">
    <div class="container">
      <?php the_field('intro_content'); ?>
    </div>
  </section>
  <div class="portfolio-gallery">
    <div class="container-fluid">
      <div class="row">
        <?php 
          $portfolios = new WP_Query(array('post_type' => 'dannex_portfolios', 'posts_per_page' => -1, 'post_status' => 'publish'));
          if($portfolios->have_posts()): while($portfolios->have_posts()): $portfolios->the_post();
            if(($portfolios->post_count%2!==0) && (($portfolios->current_post + 1) == ($portfolios->post_count)): ?>
              <div class="col-sm-12">
            <?php else: ?>
              <div class="col-sm-6">
            <?php endif; ?>
                <div class="gallery-opener" style="background-image:url(<?php the_field('portfolio_background_image'); ?>); <?php the_field('portfolio_background_image_css'); ?>">
                  <div class="caption-wrapper">
                    <div class="caption">
                      <?php $images = get_field('portfolio_gallery'); ?>
                      <h1><a href="<?php echo $images[0]['url']; ?>" class="gallery-link" data-lightbox="<?php the_title(); ?>" data-title="<?php echo $images[0]['title']; ?>"><?php the_title(); ?></a></h1>
                      <?php $i=0;
                        for($i==0; $i<$images+1; $i++): ?>
                          <?php if($i==0){ continue; } ?>
                          <a href="<?php echo $images[$i]['url']; ?>" class="gallery-link" data-lightbox="<?php the_title(); ?>" data-title="<?php echo $images[$i]['title']; ?>"></a>
                      <?php endfor; ?>
                    </div>
                  </div>
                </div><!-- gallery-opener -->
              </div><!-- col-sm -->
        <?php endwhile; endif; ?>
      </div><!-- row -->
    </div><!-- container-fluid -->
  </div><!--portfolio-gallery -->
</main>
<?php get_footer(); ?>