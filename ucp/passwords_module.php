<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\ucp;

class passwords_module {

	/**
	 * @var $action;
	 */
	public $u_action;

	/**
	 * @var $tpl_name;
	 */
	public $tpl_name;

	/**
	 * @var $page_title;
	 */
	public $page_title;

	/**
	 * UCP module
	 */
	public function main( $id, $mode ) {

		global $phpbb_container;

		$language = $phpbb_container->get( 'language' );

		$this->tpl_name = 'ucp_passwords';
		$this->page_title = $language->lang( 'UCP_API_MODULE_PASSWORDS_TITLE' );

		$controller = $phpbb_container->get( 'danieltj.api.controller.ucp' );
		$controller->passwords( $this->u_action );

	}

}
