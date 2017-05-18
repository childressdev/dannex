<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    <meta http-equiv="cache-control" content="public">
    <meta http-equiv="cache-control" content="private">
    <title>Dannex Construction</title>

    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body<?php body_class(); ?>>
    <nav class="navbar">
      <div class="masthead">
        <a href="<?php echo home_url('contact'); ?>" class="get-started">Get started today!</a>
        <a href="<?php the_field('phone', 'option'); ?>" class="phone"><?php the_field('phone', 'option'); ?></a>
        <a href="<?php echo home_url(); ?>" class="logo-full"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dannex-construction-logo_200.png" class="img-responsive center-block" alt="Dannex Construction Logo" /></a>
        <a href="<?php echo home_url(); ?>" class="logo-mini"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dannex-construction-logo_26.png" class="" alt="Dannex Construction Mini Logo" /></a>
        <ul class="nav navbar-nav navbar-right navbar-nav-mini">
          <li><a href="<?php echo home_url('services'); ?>">Services</a></li>
          <li><a href="<?php echo home_url('portfolio'); ?>">Portfolio</a></li>
          <li><a href="<?php echo home_url('projects'); ?>">Projects</a></li>
          <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
        </ul>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
          <span class="sr-only">Navigation Toggle</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-bottom navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo home_url('services'); ?>">Services</a></li>
          <li><a href="<?php echo home_url('portfolio'); ?>">Portfolio</a></li>
          <li><a href="<?php echo home_url('projects'); ?>">Projects</a></li>
          <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
        </ul>
      </div>
    </nav>
    <?php
      if(is_front_page()){
        $header_image = get_stylesheet_directory_uri() . '/images/house-stone-2-car-garage.jpg';
      }
      else{
        $header_image = get_stylesheet_directory_uri() . '/images/stone-house-balcony.jpg';
      }
      if(get_field('header_image')){
        $header_image = get_field('header_image');
      }
    ?>
    <section class="hero<?php if(is_front_page()){ echo ' hp-hero'; } ?>" style="background-image:url(<?php echo $header_image ?>); <?php the_field('header_image_css'); ?>">
      <div class="caption-wrapper">
        <div class="caption">
          <?php if(get_field('header_title')): ?>
            <div class="header-background">
              <h2><?php the_field('header_title'); ?></h2>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
