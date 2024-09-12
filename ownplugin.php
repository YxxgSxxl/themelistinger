<?php

/*
Plugin Name: Own Plugin (themes listinger)
Description: A simple security plugin to list all themes
Tags: security, themes, ownplugin
Version: 1.0
Author: YxxgSxxl
*/

if(!defined("ABSPATH")) {
    exit; // Interdit l'accès direct
}

function theme_listing_page(): void {
    echo "<div>
            <h1>Themes Listinger</h1>
    </div>";
}

function theme_listing_menu(): void {
    add_menu_page('Titre page', 'Theme Listinger','manage_options','idmenu', 'theme_listing_page', 'dashicons-code-standards', 5);
}

add_action('admin_menu','theme_listing_menu');

function themedir_list(): void {
    $themedir = scandir(get_theme_root() .'');
}