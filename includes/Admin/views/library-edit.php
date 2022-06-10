<div class="wrap">

    <h1><?php _e( 'Edit Book', 'library_system' );?></h1>
    

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="book_name"><?php _e( 'Book Name', 'library_system' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="book_name" id="book_name" class="regular-text" value="<?php echo esc_attr( $items->book_name ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="genre"><?php _e( 'Genre', 'library_system' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="genre" id="genre" class="regular-text" value="<?php echo esc_attr( $items->genre ) ?>">
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="author"><?php _e( 'Author', 'library_system' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="author" id="author" class="regular-text" value="<?php echo esc_attr( $items->author ) ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    
        <input type="hidden" name="id" value="<?php echo esc_attr( $items->id ); ?>" />

        <?php wp_nonce_field( 'new-book' ); //to prevent csrf hacking  ?> 
        <?php submit_button( __( 'Edit Book', 'library_system' ), 'primary', 'submit_book' ); ?>
    </form>

</div>