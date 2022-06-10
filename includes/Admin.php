<?php
    namespace Library\System;

    /**
 * this admin class
 */

 class Admin{

    function __construct(){

        $this->dispatch_actions();
        new Admin\Menu();
    }

    public function dispatch_actions(){
        $librarybook = new Admin\Librarybook();
        add_action( 'admin_init',[$librarybook,'form_handler'] );
        
        add_action( 'admin_post_library_delete_book', [ $librarybook, 'delete_book' ] );
    }
 }