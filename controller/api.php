<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license https://opensource.org/license/gpl-2-0
 */

namespace danieltj\api\controller;

use phpbb\auth\auth;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\language\language;
use phpbb\user;
use danieltj\api\includes\functions;
use \Symfony\Component\HttpFoundation\Request as HttpRequest;
use \Symfony\Component\HttpFoundation\Response as Response;
use \Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class api {

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
     * @todo create router that points to other controllers
     */
    public function router() {

        $response = [
            'message'   => $this->language->lang( 'DEFAULT_API_RESPONSE' ),
            'status'    => 200,
            'version'   => [
                'phpbb' => $this->config[ 'version' ],
                'api'   => $this->api_ver
            ],
            'routes'    => []
        ];

        return new JsonResponse( $response, 200 );

    }

}