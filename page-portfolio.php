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
        <div class="col-sm-6">
          <div class="gallery-opener" style="background-image:url(images/stone-house-3car-garage.jpg);">
            <div class="caption-wrapper">
              <div class="caption">
                <h1><a href="images/house-stone-3-car-garage.jpg" class="gallery-link" data-lightbox="new-home-construction" data-title="New Home Construction 1">New Home Construction</a></h1>
                <a href="images/house-stone-driveway.jpg" class="gallery-link" data-lightbox="new-home-construction" data-title="New Home Construction 2"></a>
                <a href="images/house-stucco.jpg" class="gallery-link" data-lightbox="new-home-construction" data-title="New Home Construction 3"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="gallery-opener" style="background-image:url(images/house-wood-frame.jpg);">
            <div class="caption-wrapper">
              <div class="caption">
                <h1><a href="images/house-stone-3-car-garage.jpg" class="gallery-link" data-lightbox="home-additions" data-title="Home Additions 1">Home Additions</a></h1>
                <a href="images/house-stone-driveway.jpg" class="gallery-link" data-lightbox="home-additions" data-title="Home Additions 2"></a>
                <a href="images/house-stucco.jpg" class="gallery-link" data-lightbox="home-additions" data-title="New Home Construction 3"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="gallery-opener" style="background-image:url(images/bathroom-2-sink.jpg);">
        <div class="caption-wrapper">
          <div class="caption">
            <h1><a href="images/house-stone-3-car-garage.jpg" class="gallery-link" data-lightbox="kitchen-bathroom-and-basement-remodels" data-title="Kitchen, Bathroom, and Basement Remodels 1">Kitchen, Bathroom, and Basement Remodels</a></h1>
            <a href="images/house-stone-driveway.jpg" class="gallery-link" data-lightbox="kitchen-bathroom-and-basement-remodels" data-title="Kitchen, Bathroom, and Basement Remodels 2"></a>
            <a href="images/house-stucco.jpg" class="gallery-link" data-lightbox="kitchen-bathroom-and-basement-remodels" data-title="Kitchen, Bathroom, and Basement Remodels 3"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>