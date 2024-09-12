<?php

/*
Plugin Name: Own Plugin (themes listinger)
Description: A simple security plugin to list all themes
Version: 1.0
Author: YxxgSxxl
*/

if(!defined("ABSPATH")) {
    exit; // Interdit l'accès direct
}

function theme_listing_page(): void {
    echo "<div>
            <h1>Ma page dans l'Admin panel</h1>
    </div>";
}

function theme_listing_menu(): void {
    add_menu_page('Titre page', 'Titre menu','','','');
}