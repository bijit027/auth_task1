<?php
    namespace Library\System\Admin;

    /**
     * the menu handler class
     */

    class Menu{

        function __construct(){
            add_action( 'admin_menu', [ $this, 'admin_menu']);
        }

        public function admin_menu(){
           
            $parent_slug = 'library_system';
            $capability = 'manage_options';
    
            add_menu_page( __( 'Library System', 'library_system' ), __( 'Library', 'library_system'  ), $capability, $parent_slug, [ $this, 'addressbook_page' ], 'dashicons-welcome-learn-more' );
            add_submenu_page( $parent_slug, __( 'Library Book', 'library_system' ), __( 'Library Book', 'library_system' ), $capability, $parent_slug, [ $this, 'addressbook_page' ] );
            add_submenu_page( $parent_slug, __( 'Settings', 'library_system' ), __( 'Settings', 'library_system' ), $capability, 'library_system_settings', [ $this, 'settings_page' ] );
        }



        public function addressbook_page(){
            $adressbook = new Librarybook();
            $adressbook->plugin_page();
 
         }
 
         public function settings_page(){
             echo 'Test menu for submenue';
         }
    }