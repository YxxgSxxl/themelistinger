<?php

/*
Plugin Name: Theme Listinger
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

    themedir_list();
}

function theme_listing_menu(): void {
    // Ajoute le menu dans l'Admin panel de WordPress
    add_menu_page('Titre page', 'Theme Listinger','manage_options','idmenu', 'theme_listing_page', 'dashicons-code-standards', 5);
}

add_action('admin_menu','theme_listing_menu');

function themedir_list(): void {
    // Liste tout les thèmes retrouvés dans le fichier racine des thèmes du moteur WordPress
    $themesdir = scandir(get_theme_root() .'');

    echo "<h2>Liste de tous les themes</h2>";

    foreach($themesdir as $onedir) {
        echo '<ul>';
        echo '<li>' . $onedir . '</li>';
        echo '</ul>';
    }
}