<?php global $smof_data; ?>

<!-- BEGIN: HEADER -->
<header id="header" class="style3 clearfix text-center">
    <div class="container">

        <!-- begin: logo -->
        <?php
        if (isset($_COOKIE["pixel_ratio"])) {
            $pixel_ratio = $_COOKIE["pixel_ratio"];
            $upload_logo = $pixel_ratio >= 2 ? $smof_data['logo2'] : $smof_data['logo'];
        } else {
            $upload_logo = $smof_data['logo'];
        }
        ?>
        <h1 class="logo">
            <a href="<?php echo home_url() ?>"><img width="<?php echo $smof_data['logo_width'] ?>" src="<?php echo $upload_logo ?>" alt="<?php bloginfo('name') ?>" /></a>
        </h1>
        <!-- end: logo -->


        <!-- begin: menu -->
        <?php
        if (has_nav_menu('main_menu')):
            $args = array(
                'theme_location' => 'main_menu',
                'container'      => 'nav',
                'menu_id'        => 'menu',
                'menu_class'     => 'clearfix'
            );
            wp_nav_menu($args);
        endif;
        ?>
        <!-- end: menu -->
        <div class="social-block clearfix">
            <ul class="clearfix">
                <li class="facebook">
                    <a href="https://www.facebook.com/LeighNicholsPhotography" target="_blank" original-title="Facebook"></a>
                </li>
                <li class="flickr">
                    <a href="#" target="_blank" original-title="Flickr"></a>
                </li>
                <li class="pinterest">
                    <a href="#" target="_blank" original-title="Pinterest"></a>
                </li>
            </ul>
        </div>
    </div><!-- end: div.container  -->
</header>
<!-- END: HEADER -->