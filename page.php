<?php get_header(); ?>
<section>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <div class="page-header text-center">
          <h1><?php the_title(); ?></h1>
          </div>
          <?php the_content(); ?>
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
