<?php
    namespace Library\System\Admin;

/**
 *Addressbook handler class
 *
 *  */
    class Librarybook{
        public function plugin_page(){
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list'; //by default it will show the address_list.php file
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ( $action ) {
            case 'new':
                $template = __DIR__ . '/views/library-new.php';
                break;

            case 'edit':

                $items = library_get_book($id);
                $template = __DIR__ . '/views/library-edit.php';
                break;

            case 'view':
                $template = __DIR__ . '/views/library-view.php';
                break;

            default:
                $address  = lb_book_get_addresses();
               
                $template = __DIR__ . '/views/library-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        } 

        

        
 }
 public function form_handler() {
    if ( ! isset( $_POST['submit_book'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-book' ) ) {
        wp_die( 'Are you cheating?' );
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Are you cheating?' );
    }
    $id = isset( $_POST['id'] )? intval( $_POST['id'] ) : 0;
    $book_name    = isset( $_POST['book_name'] ) ? sanitize_text_field( $_POST['book_name'] ) : '';
    $genre = isset( $_POST['genre'] ) ? sanitize_textarea_field( $_POST['genre'] ) : '';
    $author   = isset( $_POST['author'] ) ? sanitize_text_field( $_POST['author'] ) : '';

    if ( empty( $book_name ) ) {
        $this->errors['name'] = __( 'Please provide a book name', 'library-system' );
    }

    if ( empty( $genre ) ) {
        $this->errors['genre'] = __( 'Please provide a genre.', 'library-system' );
    }

    if ( ! empty( $this->errors ) ) {
        return;
    }
    $args =  [
        'book_name'    => $book_name,
        'genre' => $genre,
        'author'   => $author
    ];

    if( $id ) {
        $args['id'] = $id;
    }
    $insert_id = lb_book_insert( $args );

    if ( is_wp_error( $insert_id ) ) {
        wp_die( $insert_id->get_error_message() );
    }

    if( $id ){
        $redirected_to = admin_url( 'admin.php?page=library_system&action=edit&address-updated=true&id=' . $id);

     }else{

        $redirected_to = admin_url( 'admin.php?page=library_system&insterted=true' );

     }

   // $redirected_to = admin_url( 'admin.php?page=library_system&inserted=true' );
    wp_redirect( $redirected_to );
    
    exit;
}


public function delete_book() {
    if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'library_delete_book' ) ) {
        wp_die( 'Are you cheating?' );
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Are you cheating?' );
    }

    $id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

    if ( library_delete_book( $id ) ) {
        $redirected_to = admin_url( 'admin.php?page=library_system&address-deleted=true');
    } else {
        $redirected_to = admin_url( 'admin.php?page=library_system&address-deleted=false' );
    }

    wp_redirect( $redirected_to );
    exit;
}
}