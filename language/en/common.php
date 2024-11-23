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
	'API'	=> 'API for phpBB',
] );
