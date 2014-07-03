<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Petit Mondial</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/screen.css" />
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php 
            wp_nav_menu(
                array(
                    'menu'           => 'Menu',
                    'theme_location' => 'Menu',
                    'container'      => '',
                    'menu_class'     => 'nav nav-mobile',
                    'menu_id'        => 'myPanel'
                )
            )            
        ?>

        <div class="container">
            <header id="header">
                <h1><a class="branding" href="/">PETIT <em>MONDIAL</em></a></h1>

                <a class="btn-navbar" data-target="#myPanel" data-toggle="panel" data-page=".container" href="#"></a>

            </header>

            <aside id="sidebar">
                <?php 
                    wp_nav_menu(
                        array(
                            'menu'           => 'Menu',
                            'theme_location' => 'Menu',
                            'container'      => 'nav',
                            'menu_class'     => 'nav'
                        )
                    );
                ?>
            </aside>

            <section id="content">
