<?php get_header(); ?>
<section>
    <div class="container archive">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
          <h1><?php wp_title(''); ?></h1>
          </div>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <article class="post">
          <h3><a herf="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><em>
            By <?php the_author(); ?>
            on <?php echo the_time('l,F jS,Y'); ?>
            in <?php the_category(', '); ?>
            <a href=<?php comments_link(); ?>><?php comments_number(); ?></a>
          </em></p>
            <?php the_excerpt(); ?>
            <hr/>
          </aricle>

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
