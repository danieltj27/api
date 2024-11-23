<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\includes;

use phpbb\auth\auth;
use phpbb\db\driver\driver_interface as database;

final class functions {

	/**
	 * @var auth
	 */
	protected $auth;

	/**
	 * @var driver_interface
	 */
	protected $db;

	/**
	 * Constructor
	 */
	public function __construct( auth $auth, database $db ) {

		$this->auth = $auth;
		$this->db = $db;

	}

}
