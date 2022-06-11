<?php


/**
 * Insert a new address
 * 
 * @param array $args
 * 
 * @return int/Wp_erros
 * 
 */


function lb_book_insert( $args = [] ){

    global $wpdb;

    if( empty( $args['book_name'] ) ){

        return new \Wp_Error( 'no-name', __( 'you must provide a name', ' practice_crud ' ) );
      }

    $defaults = [
        'book_name' => '',
        'genre' => '',
        'author' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql')
    ];

    $data =  wp_parse_args( $args, $defaults ); //it will merge the form value with $defaults

    if(isset($data['id'])){


        $id = $data['id'];

        unset($data['id']); //we jus tunset the id because we do not want to make any change in id
        $updated = $wpdb->update(
            "{$wpdb->prefix}library_books",
            $data,
            [ 'id' => $id ],
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s'
    
            ],
            [ '%d' ]
    
        );
    
        return $updated;
    



    }else{

    

   $inserted = $wpdb->insert( 
        "{$wpdb->prefix}library_books",
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%d',
            '%s'

        ]
        );

        if( ! $inserted ) {

            return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'practice-crud' ) );

        }

        return $wpdb->insert_id;

    }




}


/**
 * Fetch Addresses
 *
 * @param  array  $args
 *
 * @return array
 */
function lb_book_get_addresses() {
    global $wpdb;

    


    $sql = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}library_books");




function library_get_books( $args = [] ){
    global $wpdb;

    $defaults = [
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC'
    ];

    $args = wp_parse_args( $args, $defaults );

    $sql = $wpdb->prepare(
           "SELECT * FROM {$wpdb->prefix}library_books
           ORDER BY {$args['orderby']} {$args['order']}
           LIMIT %d, %d",
           $args['offset'], $args['number']
   );

   $items = $wpdb->get_results( $sql );

   return $items;

   }

   /**
 * Get the count of total address
 *
 * @return int
 */

function library_get_books_count(){

    global $wpdb;

    return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}library_books " );
 }



    
    

   

    return $sql;
}


/**
 * Fetch a single contact from the DB
 *
 * @param  int $id
 *
 * @return object
 */
function library_get_book( $id ) {
    global $wpdb;

    return $wpdb->get_row(
        $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}library_books WHERE id = %d", $id )
    );
}


/**
 * Delete an address
 *
 * @param  int $id
 *
 * @return int|boolean
 */     

function library_delete_book($id){
    global $wpdb;

     return $wpdb->delete(
        $wpdb->prefix . 'library_books',
        [ 'id' => $id ],
        [ '%d' ]
    );
 }


 function lb_book_get_addresses_genre( $items ){
    global $wpdb;
    $genre = $items;
    $sql = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}library_books WHERE genre=%s",
            $genre
            
          )
        );
    return $sql;
    

}

