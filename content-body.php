          <!-- Portfolio Grid Section -->
          <section id="portfolio">
          <div class="container">
          <div class="row">
          <div class="col-lg-12 text-center">
          <h2>Portfolio</h2>
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
          </div>
          </section>

          <!-- About Section -->
          <section class="success" id="about">
          <div class="container">
          <div class="row">
          <div class="col-lg-12 text-center">
          <h2>About</h2>
          <hr class="star-light">
          </div>
          </div>
          <div class="row">
          <?php
          $the_query = new WP_Query( 'pagename=about' );
          ?>
          <?php if(have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
          <?php the_content(); ?>   
          <?php endwhile; else: ?>
          <p>This is a demo about text,please create a about page</p>
          <?php endif; ?>
          </div>
          </div>
          </section>
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

          <!-- Contact Section -->
          <section id="contact" class="contact-home">
          <div class="container">
          <div class="row">
          <div class="col-lg-12 text-center">
          <h2>Contact Me</h2>
          <hr class="star-light">
          </div>
          </div>
          <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
          <?php if(dynamic_sidebar('home-contact')): ?>
          <?php else: ?>
          <p>Add Contact Form widget here </p>
          <?php endif; ?>
          </div>
          </div>
          </div>
          </section>