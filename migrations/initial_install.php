<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\migrations;

class initial_install extends \phpbb\db\migration\migration {

	/**
	 * Check installation status.
	 */
	public function effectively_installed() {

		return $this->db_tools->sql_table_exists( $this->table_prefix . 'app_passwords' );

	}

	/**
	 * Requires phpBB 3.3 migration.
	 */
	static public function depends_on() {

		return [ '\phpbb\db\migration\data\v330\v330' ];

	}

	/**
	 * Install
	 */
	public function update_schema() {

		return [
			'add_tables' => [
				$this->table_prefix . 'app_passwords' => [
					'COLUMNS' => [
						'password_id'		=> [ 'UINT', null, 'auto_increment' ],
						'user_id'			=> [ 'UINT:8', 0 ],
						'password_name'		=> [ 'VCHAR:50', '' ],
						'password_hash'		=> [ 'VCHAR:250', '' ],
						'created_at'		=> [ 'UINT:8', 0 ],
						'updated_at'		=> [ 'UINT:8', 0 ],
						'expires_at'		=> [ 'UINT:8', 0 ]
					],
					'PRIMARY_KEY' => 'password_id'
				]
			]
		];

	}

	/**
	 * Uninstall
	 */
	public function revert_schema() {

		return [
			'drop_tables' => [
				$this->table_prefix . 'app_passwords'
			]
		];

	}

	/**
	 * Update stored data.
	 */
	public function update_data() {

		return [
			[ 'module.add', [ 'ucp', 'UCP_PROFILE',
				[
					'module_auth'		=> 'ext_danieltj/api && acl_u_use_api_resource',
					'module_basename'	=> '\danieltj\api\ucp\passwords_module',
					'module_langname'	=> 'UCP_API_MODULE_PASSWORDS_TITLE',
					'module_mode'		=> 'passwords'
				]
			] ],

			[ 'permission.add', [ 'u_use_api_resource' ] ],
			[ 'if', [
				[ 'permission.role_exists', [ 'ROLE_USER_FULL' ] ],
				[ 'permission.permission_set', [ 'ROLE_USER_FULL', 'u_use_api_resource' ] ],
			] ],
		];

	}

}
