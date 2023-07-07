<?php

require_once 'vendor/autoload.php';
require_once(dirname(__FILE__) . '/classes/controllers/PA_ACF_Child-settings.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_ACF_Leaders.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_ACF_Site-ministries.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_CPT_Projects.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_CPT_Leaders.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_CPT_SliderHome.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_Enqueue_Files.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_Page_Lideres.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_CPT_District.class.php');
require_once(dirname(__FILE__) . '/classes/controllers/PA_Theme_Helpers.php');
require_once(dirname(__FILE__) . '/classes/PA_Theme_Handler.php');

add_action('after_setup_theme', function () {
    load_theme_textdomain('iasd', get_stylesheet_directory() . '/language/');

    add_theme_support('custom-logo');
}, 9);

/**
 * Remove unused taxonomies
 */
add_action('wp_loaded', function () {
    unregister_taxonomy_for_object_type('xtt-pa-colecoes', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-departamentos', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-editorias', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-projetos', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-regiao', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-sedes', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-owner', 'post');
    unregister_taxonomy_for_object_type('xtt-pa-materiais', 'post');
});

add_filter('iasd_global_menu', function($menu, $name) {
    if($name != 'global-footer')
        return $menu;

    $menu = array_filter($menu, function($item) {
        return $item->name == 'Sobre Nós';
    });

    return $menu;
}, 10, 2);