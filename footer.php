<?php
$facebook = of_get_option('freelancer_fb','https://www.facebook.com');
$twitter = of_get_option('freelancer_tw','https://twitter.com/soikat');
$google_plus = of_get_option('freelancer_gp','https://plus.google.com');
$linkedin = of_get_option('freelancer_ln','https://linkedin.com');
$dribbble = of_get_option('freelancer_db','https://dribbble.com/');
 ?>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                        <?php if(!empty($facebook)): ?>
                            <li>
                                <a href="<?php echo $facebook; ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                        <?php endif; ?>
                         <?php if(!empty($google_plus)): ?>
                            <li>
                                <a href="<?php echo $google_plus; ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                        <?php endif; ?>
                              <?php if(!empty($twitter)): ?>
                            <li>
                                <a href="<?php echo $twitter; ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                         <?php endif; ?>
                          <?php if(!empty($linkedin)): ?>   
                            <li>
                                <a href="<?php echo $linkedin; ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        <?php endif; ?>
                         <?php if(!empty($dribbble)): ?>
                            <li>
                                <a href="<?php echo $dribbble; ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                      <?php echo of_get_option('freelancer_footer_editor','Copyright 2014'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
          <?php
            $portfolio_number = of_get_option('portfolio_number','6');
            $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $portfolio_number,
          );
          $the_query = new WP_Query($args);
           ?>
    <?php if(have_posts()): while($the_query->have_posts()): $the_query->the_post();  ?>       
    <div class="portfolio-modal modal fade" id="portfolio<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
       
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                       <?php
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'thumbnail-size',true);
                    $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
                       ?>
                            <h2><?php the_title(); ?></h2>
                            <hr class="star-primary">
                            <img src="<?php echo $thumbnail_url[0]; ?>" class="img-responsive img-centered" alt="<?php echo $thumbnail_meta; ?>" >
                            <?php the_content(); ?>
                            <?php
                            global $post;
                    $project_url = get_post_meta( $post->ID, '_cmb_project_url', true );
                    $project_client = get_post_meta( $post->ID, '_cmb_client_text', true );
                    $project_date = get_post_meta( $post->ID, '_cmb_project_textdate', true );
                    $project_service = get_post_meta( $post->ID, '_cmb_service_text', true );
                             ?>
                            <ul class="list-inline item-details">
                            <?php if(!empty($project_client)): ?>
                                <li>Client:
                                    <strong><a href="<?php if(!empty($project_url)) {echo $project_url;} else echo "#"; ?>"><?php echo $project_client; ?></a>
                                    </strong>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($project_date)): ?>
                                <li>Date:
                                    <strong><?php echo $project_date; ?>
                                    </strong>
                                </li>
                              <?php endif; ?>
                             <?php if(!empty($project_service)): ?>
                                <li>Service:
                                    <strong><?php echo $project_service; ?>
                                    </strong>
                                </li>
                            <?php endif; ?>
                            </ul>
                            <?php if(!empty($project_url)): ?>
                            <a href="<?php echo $project_url ?>" class="btn btn-success">View Final Project</a>
                        <?php endif; ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php wp_footer(); ?>
</body>

</html>
