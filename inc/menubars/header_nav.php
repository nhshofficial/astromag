<div class="col-md-1-8 col-sm-1-1 col-xs-1-1"> <!-- left started -->
    <header class="bg-left px-10">
        <div class="frow">
            <div class="col-md-1-1 pb-15 border-bottom">
                <!-- logo -->
                    <?php if ( has_custom_logo() ): 
                        $astromag_custom_logo_id = get_theme_mod( 'custom_logo' );
                        $astromag_logourl = wp_get_attachment_image_src( $astromag_custom_logo_id , 'astromag-logo' ); 
                    ?>
                    <a class="logo" href="<?php echo esc_url( home_url( '/' )); ?>" rel="home" itemprop="url">
                        <img src="<?php echo esc_url($astromag_logourl[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
                    <?php else : ?>
                        <a class="logo" href="<?php echo esc_url( home_url( '/' )); ?>"><h2><?php esc_url(bloginfo('name')); ?></h2><p><?php esc_url(bloginfo('description')); ?></p></a>
                    <?php endif; ?>
                <!-- menu -->
                <button id="nav-toggle" class="nav-toggle"><i class="fa-solid fa-bars-staggered"></i></button>
                <nav class="nav-collapse" id="nav">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
                        wp_nav_menu(array(
                        'theme_location'  => 'primary_menu',
                        'container'       => 'ul',
                        'container_id'    => 'navbar-menu', //changes
                        'container_class' => 'collapse navbar-collapse', //changes
                        'menu_id'         => false,
                        'menu_class'      => 'menu-items '.get_theme_mod('main_menu_setting').'', //changes
                        'depth'           => 1
                    ));
                    ?>
                </nav>
            </div> <!-- column -->

            <?php 
                $astromag_social_handles_default = [
                    [
                        'header_icon_icons' => 'fa-brands fa-facebook-square',
                        'header_icon_color' => '#065dbf',
                        'header_icon_title'  => 'Facebook',
                        'header_icon_link'  => esc_url_raw('https://facebook.com'),
                    ],
                    [
                        'header_icon_icons' => 'fa-brands fa-instagram',
                        'header_icon_color' => '#f242a5',
                        'header_icon_title'  => 'Instagram',
                        'header_icon_link'  => esc_url_raw('https://instagram.com'),
                    ],
                    [
                        'header_icon_icons' => 'fa-brands fa-twitter-square',
                        'header_icon_color' => '#08a4e5',
                        'header_icon_title'  => 'Twitter',
                        'header_icon_link'  => esc_url_raw('https://twitter.com'),
                    ],
                    [
                        'header_icon_icons' => 'fa-brands fa-linkedin',
                        'header_icon_color' => '#0b66c2',
                        'header_icon_title'  => 'LinkedIn',
                        'header_icon_link'  => esc_url_raw('https://linkedin.com'),
                    ],
                ];

                $astromag_social_handles = get_theme_mod( 'header_social_handle', $astromag_social_handles_default );
            ?>

            <div class="col-md-1-1 py-15 border-bottom">
                <ul class="header-social">
                    <?php foreach($astromag_social_handles as $astromag_social_handle) : ?>
                    <li><i class="<?php echo esc_attr( $astromag_social_handle['header_icon_icons'] ); ?>"></i> <a href="<?php echo esc_url( $astromag_social_handle['header_icon_link'] ); ?>"><?php echo esc_html( $astromag_social_handle['header_icon_title'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div> <!-- column social -->
        </div> <!-- frow -->
    </header> <!-- header -->
</div> <!-- column left ends -->
