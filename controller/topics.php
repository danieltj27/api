<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace danieltj\api\controller;

use \Symfony\Component\HttpFoundation\Response as Response;
use \Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class topics {

    /**
     * @var \phpbb\config\config
     */
    protected $config;

    /**
     * @var \phpbb\controller\helper
     */
    protected $helper;

    /**
     * @var \phpbb\language\language
     */
    protected $language;

    /**
     * Constructor
     *
     * @param \phpbb\config\config      $config
     * @param \phpbb\controller\helper  $helper
     * @param \phpbb\language\language  $language
     * @param \phpbb\template\template  $template
     */
    public function __construct( \phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\language\language $language ) {

        $this->config   = $config;
        $this->helper   = $helper;
        $this->language = $language;

    }

    /**
     * Response method for `Users` endpoint.
     *
     * @throws \phpbb\exception\http_exception
     * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
     */
    public function handle() {

        $response = [
            'message' => $this->language->lang( 'INACTIVE_ENDPOINT_RESPONSE' ),
            'status' => 200
        ];

        return new JsonResponse($response, 200);

    }

}