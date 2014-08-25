<?php
/*
Template Name: Portfolio Page Template
*/
?>
<?php get_header(); ?>
    
  <section id="portfolio">
          <div class="container">
          <div class="row">
          <div class="col-lg-12 text-center">
          <div class="page-header">
          <h2><?php the_title(); ?></h2>
          </div>
          <hr class="star-primary">
          </div>
          </div>
          <div class="row">
          <?php
          $portfolio_number = of_get_option('portfolio_number','6');
          $args = array(
          'post_type' => 'portfolio',
          'posts_per_page' => $portfolio_number,
          );
          $the_query = new WP_Query($args);
          ?>
          <?php if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();  ?>
          <div class="col-sm-4 portfolio-item">
          <?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'thumbnail-size',true);
          $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
          ?>
          <a href="#portfolio<?php the_ID(); ?>" class="portfolio-link" data-toggle="modal">
          <div class="caption">
          <div class="caption-content">
          <i class="fa fa-search-plus fa-3x"></i>
          </div>
          </div>
          <img src="<?php echo $thumbnail_url[0]; ?>" class="img-responsive" alt="<?php echo $thumbnail_meta; ?>" >
          </a>
          </div>
          <?php endwhile; else: ?>
          <div class="text-center">
          <h3 class="text-danger">You haven't added any portfolio.</h3>
          </div>
        <?php endif; ?>
          </div>
          <?php easy_pagination(); ?>
          </div>
</section>


<?php get_footer(); ?>
