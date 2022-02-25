<?php
/**
 * at_rest_init
 */
function at_rest_init()
{
    // route url: domain.com/wp-json/$namespace/$route
    $namespace = 'plugin/test';
    $route     = 'testing';

    register_rest_route($namespace, $route, array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => 'at_rest_testing_endpoint'
    ));
}

add_action('rest_api_init', 'at_rest_init');

function at_rest_testing_endpoint(){
    return json_encode("testing");
} 