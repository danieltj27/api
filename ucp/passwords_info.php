<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\ucp;

class passwords_info {

	public function module() {

		return [
			'filename'	=> '\danieltj\api\ucp\passwords_module',
			'title'		=> 'UCP_API_MODULE_PASSWORDS_TITLE',
			'modes'		=> [
				'payments'	=> [
					'title'	=> 'UCP_API_MODULE_PASSWORDS',
					'auth'	=> 'ext_danieltj/api && acl_u_use_api_resource',
					'cat'	=> [ 'UCP_PROFILE' ],
				],
			],
		];

	}

}
