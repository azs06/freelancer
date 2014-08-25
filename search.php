<?php get_header(); ?>
<section>
    <div class="container">
      <!--row of columns -->
      <div class="row">
        <div class="col-md-9">
        <div class="page-header">
        <h1><?php wp_title(''); ?></h1>
        </div>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
        <?php endwhile; else: ?>
          <div class="page-header">
          <h1>Oh! No</h1>
          </div>
          <p>Nothing to show!</p>
        <?php endif; ?>
        <?php easy_pagination(); ?>
        </div>
        <div class="col-md-3">
          <?php get_search_form(); ?>
        </div>
      </div>
      </div>
      </section>
      <?php get_footer(); ?>