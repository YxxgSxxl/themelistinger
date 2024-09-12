<?php

/*
Plugin Name: Theme Listinger
Description: A simple security plugin to list all themes and manage them
Tags: security, themes, ownplugin
Version: 1.0
Author: YxxgSxxl
*/

if(!defined("ABSPATH")) {
    exit; // Interdit l'accès direct
}

////////////////////////////
// Config plugin et pages //
////////////////////////////
function theme_main_page(): void {
    echo "<div>
            <h1>Themes Listinger</h1>
    </div>";

    themedir_list();
}

function theme_sub_page(): void {
    echo "<div>
            <h1>Sous menu Themes Listinger</h1>
    </div>";
}

function theme_listing_menu(): void {
    // Ajoute le menu dans l'Admin panel de WordPress
    add_menu_page('Titre page', 'Theme Listinger','manage_options','idmenu', 'theme_main_page', 'dashicons-code-standards', 30);

    add_submenu_page('idmenu', 'Titre Sous-Page','Sous-Menu1','manage_options', 'idsmenu', 'theme_sub_page', 30);
}

add_action('admin_menu','theme_listing_menu');

// Fonction qui sera lancée lors de l'activation du plugin
function plugin_activation(): void {
    // Creation d'une table pour le plugin dans la BDD
    global $wpdb;
    $table_name = $wpdb->prefix.'theme_listinger';
    // FIX: Code manquant (requête SQL)

    // Quand plugin activé, redirection sur un site internet
    header("Location: http://www.perdu.com/");
    exit;
}

register_activation_hook(__FILE__,"plugin_activation");

//////////////////////////////
// Fonctionnement du plugin //
//////////////////////////////
function themedir_list(): void {
    // Liste tout les thèmes retrouvés dans le fichier racine des thèmes du moteur WordPress
    $themesdir = scandir(get_theme_root() .'');

    echo "<h2>List of themes</h2>";

    // Affiche la liste des dossiers/fichiers
    foreach($themesdir as $onedir) {
        echo '<ul>';
        echo '<li>' . $onedir . '</li>';
        echo '</ul>';
    }
}

// Fonction qui affiche dans le front-end (exemple)
function themedir_list_shortcode(): string {
    ob_start();
    themedir_list();
    return ob_get_clean();
}

// Ajout du shortcode
add_shortcode('theme_list','themedir_list_shortcode');