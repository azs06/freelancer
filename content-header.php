    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php if ( of_get_option( 'freelancer_image' ) ) {
                    $profile_image = of_get_option( 'freelancer_image' );
                    }
                    else {
                        $profile_image = get_template_directory_uri().'/img/profile.png'; 
                    }
                     ?>
                    <img class="img-responsive img-circle img-thumbnail profile-image" src="<?php echo $profile_image; ?>" alt="">
                    <div class="intro-text">
                        <span class="name"><?php echo of_get_option( 'freelancer_name', 'Freelancer Name' ); ?></span>
                        <hr class="star-light">
                        <span class="skills">
                        <?php echo of_get_option('freelance_desc','Super strength - X-ray Vision - Cooking') ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
