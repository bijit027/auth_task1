<?php
namespace Library\System;

 /**
  * installer class
  */

  class Installer{

    /**
     * run the installer
     * 
     * @return void
     * 
     */

    function run(){

        $this->add_version();
        $this->create_tables();

    }

    public function add_version(){

        $installed = get_option( 'wp_library_installed' );

        if( !$installed ) {

            update_option( 'wp_library_installed', time() );
        }

        update_option( 'wp_library_version', WP_LIBRARY_VERSION );
     }

     /**
      * create necessary database tables
      *@return void
      */
     
     public function create_tables(){

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE `{$wpdb->prefix}library_books` (
            `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `book_name` varchar(255) NOT NULL,
            `genre` varchar(255) DEFAULT NULL,
            `author` varchar(100) DEFAULT NULL,
            `created_by` bigint(20) UNSIGNED NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate";

          if( ! function_exists( 'dbDelta' )){

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';

          }

          dbDelta( $schema );

     }
    
  }