<?php get_header(); ?>
<section>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
           <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php
$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'thumbnail-size',true);
$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
   ?>
        <div class="page-header text-center featured image"><h2><?php the_title(); ?></h2>
         <hr class="star-primary">   
           <img src="<?php echo $thumbnail_url[0]; ?>" class="img-responsive img-centered" alt="<?php echo $thumbnail_meta; ?>" >
        </div>
        <div class="panel panel-default">
  <div class="panel-body">
 <?php the_content(); ?>
  </div>
</div>
        <?php
        global $post;
$project_url = get_post_meta( $post->ID, '_cmb_project_url', true );
$project_client = get_post_meta( $post->ID, '_cmb_client_text', true );
$project_date = get_post_meta( $post->ID, '_cmb_project_textdate', true );
$project_service = get_post_meta( $post->ID, '_cmb_service_text', true );
         ?>
         <div class="col-md-12">
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
        </div>
        <div class="col-md-6">
        <?php if(!empty($project_url)): ?>
        <a href="<?php echo $project_url ?>" class="btn btn-success">View Final Project</a>
<?php endif; ?>
        </div>
          <?php endwhile; else: ?>
          <div class="page-header text-center">
          <h1>Oh! No</h1>
          </div>
          <p>Nothing to show!</p>
        <?php endif; ?>
      </div>
      </div>
      </div>
      </section>
<?php get_footer(); ?>
