<?php
    include('_ajax/posts-list.php');

function loadScripts() {

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js', null, null, true);
    wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', null, null, true);
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css', 1, 1, 'all');

    $wpVars = array(
        'ajaxUrl' => admin_url('admin-ajax.php')
    );

    wp_localize_script('app', 'wp', $wpVars);

}

add_action('wp_enqueue_scripts', 'loadScripts');