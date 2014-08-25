  <?php
$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_src($thumbnail_id,'thumbnail-size',true);
$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
   ?>
        <div class="page-header text-center"><h2><?php the_title(); ?></h2>
         <hr class="star-primary">   
        </div>
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