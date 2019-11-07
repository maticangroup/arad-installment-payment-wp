<?php
require "theme/Bootstrap.php";
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'General Settings',
        'menu_slug' => 'theme-general-settings',
    ));
}

function custom_post_type()
{
    $labels = array(
        'name' => 'Installments',
        'singular_name' => 'Installments',
        'menu_name' => 'Installments',
        'parent_item_colon' => 'Installments',
        'all_items' => 'All Installments',
        'view_item' => 'View Installments',
        'add_new_item' => 'Add New Installments',
        'add_new' => 'Add New Installments',
        'edit_item' => 'Edit Installments',
        'update_item' => 'Update Installments',
        'search_items' => 'Search Installments',
        'not_found' => 'Installments are not found',
        'not_found_in_trash' => 'Installments are not found',
    );
    $args = array(
        'label' => 'Installments',
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
    );
    register_post_type('installments', $args);
}

add_action('init', 'custom_post_type', 0);
