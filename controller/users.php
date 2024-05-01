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

use \Symfony\Component\HttpFoundation\Response as Response;
use \Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class users {

    /**
     * @var \phpbb\config\config
     */
    protected $config;

    /**
     * @var \phpbb\db\driver\driver_interface
     */
    protected $database;

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
     * Authenticate an API key.
     * 
     * @todo need to think about api key security and hashing
     * 
     * @param string $api_key
     * @return boolean
     */
    private function _validate_api_key( $api_key = '' ) {

        $sql = 'SELECT user_api_key FROM ' . USERS_TABLE . ' WHERE ' . $this->database->sql_build_array( 'SELECT', [
            'user_api_key' => $api_key
        ] );

        $result = $this->database->sql_query( $sql );
        $user = $this->database->sql_fetchrow( $result );
        $this->database->sql_freeresult( $result );

        if ( NULL === $user ) {

            return false;

        }

        return true;

    }

    /**
     * Fetch selected user.
     * 
     * @param integer $user_id
     * @return boolean|array
     */
    private function get_user( $user_id = 0 ) {

        if ( 0 === $user_id ) {

            return false;
        
        }

        $sql = 'SELECT * FROM ' . USERS_TABLE . ' WHERE ' . $this->database->sql_build_array( 'SELECT', [
            'user_id' => $user_id
        ] );

        $result = $this->database->sql_query( $sql );
        $user = $this->database->sql_fetchrow( $result );
        $this->database->sql_freeresult( $result );

        if ( NULL === $user ) {

            return false;

        }

        return $user;

    }

    /**
     * Response method for `Users` endpoint.
     *
     * @param integer $user_id
     * @throws \phpbb\exception\http_exception
     * @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
     */
    public function endpoint( $user_id = 0 ) {

        // Create initial response
        $response = [
            'message'   => $this->language->lang( 'DEFAULT_API_RESPONSE' ),
            'status'    => 200,
            'data'      => [
                'user_id' => (int) $user_id,
                'user' => []
            ]
        ];

        // Fetch user
        $user = $this->get_user( $user_id );

        if ( false !== $user ) {

            $response[ 'data' ][ 'user' ] = [
                'user_id' => $user[ 'user_id' ],
                'user_name' => $user[ 'username' ],
                'user_email' => $user[ 'user_email' ],
            ];
        
        }

        return new JsonResponse( $response, 200 );

    }

}