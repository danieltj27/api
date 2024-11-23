<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

if ( ! defined( 'IN_PHPBB' ) ) {

    exit;

}

if ( empty( $lang ) || ! is_array( $lang ) ) {

    $lang = [];

}

$lang = array_merge( $lang, [
    'API_RETURN_CONNECTION_OKAY'    => 'Connection established to the API.',
    'API_RETURN_HELLO_WORLD'        => 'Hello, you\'re using the API extension.',
    'API_RETURN_ENDPOINT_OFFLINE'   => 'Endpoint is inactive, please do not use.',
] );
