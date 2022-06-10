<?php

namespace Library\System\Frontend;




class Enquery {



    function __construct() {

        add_shortcode( 'academy_shortcode' , [ $this, 'render_shortcode' ] );
    }



    public function render_shortcode( $atts, $content = '' ) {

        ob_start();

        include __DIR__ . '/views/enquery.php';

        return ob_get_clean();
    }
}