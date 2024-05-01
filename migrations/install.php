<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace danieltj\api\migrations;

class install extends \phpbb\db\migration\migration {

	/**
	 * Check extension is installed
	 */
	public function effectively_installed() {

		return $this->db_tools->sql_column_exists( $this->table_prefix . 'users', 'user_api_key' );

	}

	/**
	 * Require 3.3.x or later
	 */
	static public function depends_on() {

		return [ '\phpbb\db\migration\data\v33x\v331rc1' ];

	}

	/**
	 * Add column
	 */
	public function update_schema() {

		return [
			'add_columns' => [
				$this->table_prefix . 'users' => [
					'user_api_key'	=> [
						'VCHAR:250', ''
					]
				]
			]
		];

	}

	/**
	 * Delete column
	 */
	public function revert_schema() {

		return [
			'drop_columns' => [
				$this->table_prefix . 'users' => [
					'user_api_key'
				]
			]
		];

	}

}
