<?php get_header(); ?>
<section>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="text-center">
        <h2 class="text-danger">Oh! Snap! Couldn't find what you looking for?</h2>
        <h3 class="text-success">Here is a Pokemon for You! <span class="glyphicon glyphicon-hand-down"></span></h3>
      </div>
          <?php
          $total = 719;
          $pokemon = rand(1,$total);
          if($pokemon <10){
            $pokemon = sprintf("%03d", $pokemon);
          }
          elseif($pokemon >10 && $pokemon < 100){
          $pokemon = sprintf("%03d", $pokemon);
        }

           ?>
           <div class="container text-center pokemon">
           <a href="http://www.pokemon.com/us/pokedex/<?php echo $pokemon; ?>"><img src="http://assets22.pokemon.com/assets/cms2/img/pokedex/full/<?php echo $pokemon ?>.png"></a>
         </div>
        </div>
        <div class="page-header text-center"><h3 class="text-info">You can go to Home
           page of <a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a> or you can search whatever you are looking for, better luck next time.</h3></div>
        <div class="row">
          <div class="col-md-6">
        <a href="<?php bloginfo('url');  ?>"><button type="button" class="btn btn-success btn-lg">Go Home <span class="glyphicon glyphicon-home"></span></button></a>
      </div>
      <div class="col-md-6 searchfour">
        <?php echo boots_search_form($form); ?>
      </div>
      </div>
    </div>
  </div>
  </div>
  </section>
<?php get_footer(); ?>
