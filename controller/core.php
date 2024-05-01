<?php

/**
 * @package API
 * @copyright (c) 2024 Daniel James
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace danieltj\api\controller;

use phpbb\config\config;
use phpbb\db\driver\driver_interface as database;
use phpbb\controller\helper;
use phpbb\language\language;

use \Symfony\Component\HttpFoundation\Request as Request;
use \Symfony\Component\HttpFoundation\Response as Response;
use \Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class core {

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
     * @param \phpbb\config\config              $config
     * @param phpbb\db\driver\driver_interface  $database
     * @param \phpbb\controller\helper          $helper
     * @param \phpbb\language\language          $language
     */
    public function __construct( config $config, database $database, helper $helper, language $language ) {

        $this->config   = $config;
        $this->database = $database;
        $this->helper   = $helper;
        $this->language = $language;

    }

    /**
     * Test method for default route.
     *
     * @throws \phpbb\exception\http_exception
     * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
     */
    public function endpoint() {

        $response = [
            'message' => $this->language->lang( 'DEFAULT_API_GREETING' ),
            'status' => 200
        ];

        return new JsonResponse( $response, 200 );

    }

}