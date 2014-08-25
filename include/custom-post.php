<?php 
// required
$args['name'] = 'portfolio';

// optional
$args['labels'] = array(
  'singular' => 'Portfolio',
  'plural'   => 'Portfolios',
  'menu'     => 'Portfolio'
);

$args['options'] = array(
  'public'         => true,
  'hierarchical'   => false,
  'supports'       => array('title', 'editor', 'thumbnail','thumbnail'),
  'has_archive'    => false
);

$args['help'] = array(
  array(
    'message'      => ''
  ),
  array(
    'context'      => 'edit',
    'message'      => 'Edit portfolio'
  )
);
$PostType = new Bamboo_Custom_Post_Type($args);
?>