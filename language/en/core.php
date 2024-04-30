<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

if ( ! defined( 'IN_PHPBB' ) ) {

    exit;

}

if ( empty( $lang ) || ! is_array( $lang ) ) {

    $lang = [];

}

$lang = array_merge( $lang, [
    'DEFAULT_API_RESPONSE'  => 'Connection established to the API.',
] );