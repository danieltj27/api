<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api;

class ext extends \phpbb\extension\base {

	/**
	 * Version Checker
	 */
	public function is_enableable() {

		$config = $this->container->get( 'config' );

		return phpbb_version_compare( $config[ 'version' ], '3.3.0', '>=' ) && phpbb_version_compare( PHP_VERSION, '7.4.0', '>=' );

	}

}
