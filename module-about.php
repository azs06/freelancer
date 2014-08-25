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