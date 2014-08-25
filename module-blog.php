 <section class="blog-home" id="blog">
          <div class="container">
          <div class="col-lg-12">
          <div class="text-center">
          <h2>Latest From Blog</h2>
          <hr class="star-primary">
          </div>
          <?php
          $posts_number = of_get_option('posts_number','1');
          $args = array(
          'post_type' => 'post',
          'posts_per_page' => $posts_number,

          );
          $the_query = new WP_Query($args);
          $blog_id = get_option('page_for_posts');
          $permalink = get_permalink( $blog_id ); 
          ?>
          <?php if(have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
          <article class="post">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><em>
          By <?php the_author(); ?>
          on <?php echo the_time('l,F jS,Y'); ?>
          in <?php the_category(', '); ?>
          </em>
          </p>
          <?php the_excerpt(); ?>
          <hr/>
          </aricle>

          <?php endwhile; else: ?>
          <p class="text-warning">There are posts to display!</p>
          <?php endif; ?>
          <?php if($the_query->have_posts()): ?>
          <a href="<?php echo $permalink; ?>" class="btn btn-success">View All Blog Posts</a>
          <?php endif; ?>
          </div>
          </div>
          </section>
