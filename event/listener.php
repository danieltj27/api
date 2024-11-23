<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\event;

use phpbb\auth\auth;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\language\language;
use phpbb\user;
use danieltj\api\includes\functions;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface {

	/**
	 * @var auth
	 */
	protected $auth;

	/**
	 * @var request
	 */
	protected $request;

	/**
	 * @var template
	 */
	protected $template;

	/**
	 * @var language
	 */
	protected $language;

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
	public function __construct( auth $auth, request $request, template $template, language $language, user $user, functions $functions ) {

		$this->auth = $auth;
		$this->request = $request;
		$this->template = $template;
		$this->language = $language;
		$this->user = $user;
		$this->functions = $functions;

	}

	/**
	 * Register Events
	 */
	static public function getSubscribedEvents() {

		return [
			'core.user_setup'		=> 'add_languages',
			'core.permissions'		=> 'add_permissions',
		];

	}

	/**
	 * Add Languages
	 */
	public function add_languages( $event ) {

		$this->language->add_lang( [
			'api', 'common', 'ucp'
		], 'danieltj/api' );

	}

	/**
	 * Add Permissions
	 */
	public function add_permissions( $event ) {

		$event->update_subarray( 'permissions', 'u_use_api_resource', [ 'lang' => 'ACL_U_USE_API_RESOURCE', 'cat' => 'misc' ] );

	}

}