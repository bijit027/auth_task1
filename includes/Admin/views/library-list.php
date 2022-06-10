


<div class="wrap">

    <h1 class="wp-heading-inline"><?php _e( 'Library book', 'library_system' );?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=library_system&action=new', 'admin'  ) ?>" class="page-title-action"><?php _e( 'Add new book', 'library_system' ) ?></a>

    <?php if ( isset( $_GET['inserted'] ) ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address has been added successfully!', 'library_system' ); ?></p>
        </div>
    <?php } ?>

    <?php if ( isset( $_GET['address-deleted'] ) && $_GET['address-deleted'] == 'true' ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address has been deleted successfully!', 'library_system' ); ?></p>
        </div>
    <?php } ?>

    <form action="" method="post" >
        <?php
        $table = new Library\System\Admin\LibraryList();
        $table->prepare_items();
        $table->search_box( 'search', 'search_id' );// by default function
        $table->display();// by default function
        ?>
   </form>

</div>




