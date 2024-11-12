<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <title>Fajna Dress Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Rubik:wght@300;400;500;600&display=swap"
          rel="stylesheet">
</head>
<body>
<header>
    <nav class="header">
        <div class="header_container">
            <div class="burger-logo-elements">
                <div class="burgerIcon">
                    <div class="TopLine"></div>
                    <div class="MidLine"></div>
                    <div class="BotLine"></div>
                </div>
                <div class="logoIcon">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" class="img-fluid"
                             alt="WebsiteLogo">
                    </a>
                </div>
            </div>
            <div class="language-switcher">
                <?php
                $current_lang = function_exists('pll_current_language') ? strtoupper(pll_current_language()) : 'SK'; // 'SK' is default
                ?>
                <button class="langbtn"><?php echo $current_lang; ?></button>
                <?php
                if (has_nav_menu('language-switcher-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'language-switcher-menu',
                        'menu_class' => 'sub-menu',
                        'fallback_cb' => false,
                        'depth' => 1
                    ));
                }
                ?>
            </div>
            <div class="burger-container-wrapper">
                <div class="mobile-header-opened">
                    <div class="burger-logo-elements-mobile">
                        <div class="burgerIconMobile">
                            <div class="TopLine"></div>
                            <div class="MidLine"></div>
                            <div class="BotLine"></div>
                        </div>
                        <div class="logoIcon">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg"
                                     class="img-fluid" alt="WebsiteLogo">
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="nav-content-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'walker' => new CustomNavWalker()
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
</body>
