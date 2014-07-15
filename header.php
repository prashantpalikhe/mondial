<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Petit Mondial</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

        <link rel="stylesheet" type="text/css" media="all" href="//mondial.palimg.com/wp-content/themes/petitmondial/css/screen.css" />

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
