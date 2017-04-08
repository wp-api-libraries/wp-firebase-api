<?php
/**
 * WP-Firebase-API (https://firebase.google.com/docs/reference/rest/database/user-auth)
 *
 * @package WP-Firebase-API
 */

/*
* Plugin Name: WP Firebase API
* Plugin URI: https://github.com/wp-api-libraries/wp-firebase-api
* Description: Perform API requests to Firebase in WordPress.
* Author: imFORZA
* Version: 1.0.0
* Author URI: https://www.imforza.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-firebase-api
* GitHub Branch: master
* Text Domain: wp-firebase-api
*/

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if class exists. */
if ( ! class_exists( 'FirebaseAPI' ) ) {

	/**
	 * Firebase API Class.
	 */
	class FirebaseAPI {

		/**
		 * FirebaseAPI Endpoint
		 *
		 * @var string
		 * @access protected
		 */
		protected $firebase_uri = 'firebaseio.com';
		
		/**
		 * timeout
		 * 
		 * @var mixed
		 * @access protected
		 */
		protected $timeout;
		
		
		/**
		 * token
		 * 
		 * @var mixed
		 * @access protected
		 */
		protected $token;


		/**
		 * __construct function.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct( $baseURI = '', $token = '' ) {
		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-firebase-api' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}



	}
}
