<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\controller;

use Symfony\Component\DependencyInjection\ContainerInterface as container;
use phpbb\event\dispatcher_interface as dispatcher;
use phpbb\language\language;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\user;
use danieltj\api\includes\functions;

final class ucp {

	/**
	 * @var container
	 */
	protected $container;

	/**
	 * @var dispatcher
	 */
	protected $dispatcher;

	/**
	 * @var language
	 */
	protected $language;

	/**
	 * @var request
	 */
	protected $request;

	/**
	 * @var template
	 */
	protected $template;

	/**
	 * @var user
	 */
	protected $user;

	/**
	 * @var functions
	 */
	protected $functions;

	/**
	 * Constructor
	 */
	public function __construct( container $container, dispatcher $dispatcher, language $language, request $request, template $template, user $user, functions $functions ) {

		$this->container = $container;
		$this->dispatcher = $dispatcher;
		$this->language = $language;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->functions = $functions;

	}

	/**
	 * Application Passwords (passwords_module)
	 * 
	 * @param  string $action The selected action (UCP section).
	 * @return mixed
	 */
	public function passwords( $action ) {

		add_form_key( 'ucp_api_csrf' );

		$this->template->assign_vars( [
			'U_ACTION' => $action
		] );

	}

}
