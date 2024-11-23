<?php

/**
 * @package Verified Profiles
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
	'ACL_U_USE_API_RESOURCE' => 'Can use API resources'
] );
