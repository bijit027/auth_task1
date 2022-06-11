<?php

namespace Library\System;



/**
 * Assets handler calss
*/

class Assets {

    function __construct(){

        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_asstes' ] );
       // add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_asstes' ] );

    }

    public function enqueue_asstes(){


         var_dump(WP_LIBRARY_ASSETS ); die();
            //  wp_enqueue_scripts( 'library_system', WP_LIBRARY_ASSETS . '/js/frontend.js' ,false,filemtime( WP_LIBRARY_PATH . '/assets/js/frontend.js' ),true );
                wp_enqueue_style( 'library_system', 
                WP_LIBRARY_PATH . '\assets\css\frontend.css' , 
                false, 

                // filemtime( WP_LIBRARY_PATH . '/assets/css/frontend.css' )
            );
        }
    }


     /**
     * Class constructor
     */
 /*   function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }


*/
    /**
     * All available scripts
     *
     * @return array
     */
/*    public function get_scripts() {
        return [
            'academy-script' => [
                'src'     => WP_LIBRARY_ASSETS . '/js/frontend.js',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'academy-enquiry-script' => [
                'src'     => WP_LIBRARY_ASSETS . '/js/enquiry.js',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/js/enquiry.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'academy-admin-script' => [
                'src'     => WP_LIBRARY_ASSETS . '/js/admin.js',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/js/admin.js' ),
                'deps'    => [ 'jquery', 'wp-util' ]
            ],
        ];
    }


     /**
     * All available styles
     *
     * @return array
     */
 /*   public function get_styles() {
        return [
            'academy-style' => [
                'src'     => WP_LIBRARY_ASSETS . '/css/frontend.css',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/css/frontend.css' )
            ],
            'academy-admin-style' => [
                'src'     => WP_LIBRARY_ASSETS . '/css/admin.css',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/css/admin.css' )
            ],
            'academy-enquiry-style' => [
                'src'     => WP_LIBRARY_ASSETS . '/css/enquiry.css',
                'version' => filemtime( WP_LIBRARY_PATH . '/assets/css/enquiry.css' )
            ],
        ];
    }
    */



