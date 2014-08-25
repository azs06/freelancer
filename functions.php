<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

  jQuery('#example_showhidden').click(function() {
      jQuery('#section-example_text_hidden').fadeToggle(400);
  });

  if (jQuery('#example_showhidden:checked').val() !== undefined) {
    jQuery('#section-example_text_hidden').show();
  }

});
</script>

<?php
}


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css','bootstrap_css','4.1.0' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

function theme_js(){

  global $wp_scripts;

  wp_register_script('html5_shiv','https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js','','',false);
  wp_register_script('respond','https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js','','',false);

  $wp_scripts->add_data('html5_shiv','conditional','lt IE9');
  $wp_scripts->add_data('respond','conditional','lt IE9');

	$handle = 'bootstrap.js';
   $list = 'enqueued';
     if (wp_script_is( $handle, $list )) {
       return;
     } else {
			wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
		}

	wp_enqueue_script('easing_js', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array('jquery','bootstrap_js'), '1.0.0', true );
  wp_enqueue_script('classie_js', get_template_directory_uri() . '/js/classie.js', array('jquery','bootstrap_js'), '1.0.0', true );
  wp_enqueue_script('cb_js', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', array('jquery','bootstrap_js'), '1.0.0', true );
  wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/freelancer.js', array('jquery','bootstrap_js'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action('wp_enqueue_scripts','theme_js');

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
function register_theme_menus(){
  register_nav_menus(
  array(
  'header-menu' => __('Header Menu')
  )
  );
}

add_action('init','register_theme_menus');
require_once('include/wp_bootstrap_navwalker.php');
require_once('include/custom-post-type.php');
require_once('include/custom-post.php');
function create_widget( $name, $id, $description, $class='' ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget '.$class.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}
create_widget( 'Contact Form', 'home-contact', 'Add contact form widget','contact-widget' );
function easy_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<span class="glyphicon glyphicon-arrow-left"></span>'),
			'next_text'    => __('<span class="glyphicon glyphicon-arrow-right"></span>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

function boots_search_form( $form ) {
	$form = '<div class="form-group"><form role="search" method="get" id="searchform" class="searchform form-inline" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input class="btn btn-default" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form></div>';

	return $form;
}

function be_sample_metaboxes( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['test_metabox'] = array(
        'id' => 'test_metabox',
        'title' => 'Portfolio Information',
        'pages' => array('portfolio'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Project Url','cmb'),
                'desc' => 'Url of the project',
                'id' => $prefix . 'project_url',
                'type' => 'text_url'
            ),
            array(
                'name' => __( 'Completion Date', 'cmb' ),
                'desc' => __( 'Date project was completed', 'cmb' ),
                'id'   => $prefix . 'project_textdate',
                'type' => 'text_date',
            ),
           array(
        'name'       => __( 'Client', 'cmb' ),
        'desc'       => __( 'Client of the project, i.e twitter', 'cmb' ),
        'id'         => $prefix . 'client_text',
        'type'       => 'text',
        'show_on_cb' => 'cmb_client_text_show_on_cb', 
        ),
          array(
        'name'       => __( 'Service', 'cmb' ),
        'desc'       => __( 'Service provided for the project, i.e Web Development', 'cmb' ),
        'id'         => $prefix . 'service_text',
        'type'       => 'text',
        'show_on_cb' => 'cmb_service_text_show_on_cb', 
        ),   
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );
// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'include/metabox/init.php' );
    }
}

?>
