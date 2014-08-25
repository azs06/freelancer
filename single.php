<?php get_header(); ?>
<section>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <div class="page-header text-center">

          <?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'thumbnail-size',true);
          $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
           ?>
  <p class="featured-image img-responsive"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"></a>
    <h1><?php the_title(); ?></h1>
          <p><em>
            By <?php the_author(); ?>
            on <?php echo the_time('l,F jS,Y'); ?>
            in <?php the_category(', '); ?>
            <a href=<?php comments_link(); ?>><?php comments_number(); ?></a>
          </em></p>
          </div>
          <?php the_content(); ?>
          <hr>
          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <div class="page-header">
          <h1>Oh! No</h1>
          </div>
          <p>Nothing to show!</p>
        <?php endif; ?>
        </div>
      </div>
      </div>
      </section>
<?php get_footer(); ?>
