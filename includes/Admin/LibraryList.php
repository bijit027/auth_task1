<?php
    namespace Library\System\Admin;


    if( !class_exists( 'WP_List_Table' ) ){
        require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
    }


/**
 * List Table class 
 * */    

 class LibraryList extends \WP_List_Table{

    function __construct(){

        parent::__construct( [
            'singular' => 'contact',
            'plural'   => 'contacts',
            'ajax'     => false
        ] );
        

    }

    public function get_columns(){

        return [
         
            'book_name' => __( 'Name', 'library_system' ),
            'genre'=> __( 'Genre', 'library_system' ),
            'author'=> __( 'Author', 'library_system' ),
            'created_at'=> __( 'Date', 'library_system' ),

        ];

    }

     /**
     * Get sortable columns
     *
     * @return array
     */
    function get_sortable_columns() {
        $sortable_columns = [
            'book_name'       => [ 'book_name', true ],
            'created_at' => [ 'created_at', true ],
        ];

        return $sortable_columns;
    }


    /**
     * Default column values
     *
     * @param  object $item
     * @param  string $column_name
     *
     * @return string
     */
    protected function column_default( $item, $column_name ) {

        switch ( $column_name ) {

            case 'created_at':
                return wp_date( get_option( 'date_format' ), strtotime( $item->created_at ) );

            default:
                return isset( $item->$column_name ) ? $item->$column_name : '';
        }
    }

    /**
     * Render the "name" column
     *
     * @param  object $item
     *
     * @return string
     */
    public function column_book_name( $item ) {
        $actions = [];

        $actions['edit']   = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=library_system&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'library_system' ), __( 'Edit', 'library_system' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=library_delete_book&id=' . $item->id ), 'library_delete_book' ), $item->id, __( 'Delete', 'library_system' ), __( 'Delete', 'library_system' ) );

       return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=library_system&action=view&id' . $item->id ), $item->book_name, $this->row_actions( $actions )
       );
    }

     /**
     * Render the "cb" column
     *
     * @param  object $item
     *
     * @return string
     */


    public function prepare_items(){

        $column   = $this->get_columns();
        $hidden   = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [ $column, $hidden, $sortable ];

        $per_page     = 20;
        $current_page = $this->get_pagenum();
        $offset       = ( $current_page - 1 ) * $per_page;

        $args = [
            'number' => $per_page,
            'offset' => $offset,
        ];

        if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order']   = $_REQUEST['order'] ;
        }

        $this->items = library_get_books( $args );

        $this->set_pagination_args( [
            'total_items' => library_get_books_count(),
            'per_page'    => $per_page
        ] );


    }
 }