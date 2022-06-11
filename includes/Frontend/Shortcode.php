<?php

namespace Library\System\Frontend;


/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initializes the class
     */
    function __construct()
    {
        add_shortcode('library-code', [$this, 'render_shortcode']);
    }




    public function loadAssets()
    {
        wp_enqueue_style(
            'library_frontends_css',
            WP_LIBRARY_BASE_DIR. 'assets/css/frontend.css',
        );
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_shortcode( $atts = [], $content = '' ) {

        $this->loadAssets();

        global $wpdb;
        $atts = shortcode_atts(array(
          'genre' => ''
        ), $atts);
        $genre = $atts['genre'];

        if(!empty($atts['genre'])){

            $items = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM {$wpdb->prefix}library_books WHERE genre=%s",
                    $atts['genre']
                  )
                );
  
                $content .= "<table id='customers'>
                <tr>
                  <th>ID</th>
                  <th>Book</th>
                  <th>Genre</th>
                  <th>Author</th>
                </tr>
                ";
        
        
               $content .="<tr>";
                
                foreach($items as $id ){
                    $content .="<tr><td>";
                    
                    $content .= esc_html($id->id);
    
    
                    $content .="</td>";
    
                    $content .="<td>";
                    
                    $content .= esc_html($id->book_name);
    
    
                    $content .="</td>";
    
                    $content .="<td>";
                    
                    $content .= esc_html($id->genre);
    
    
                    $content .="</td>";
    
                    $content .="<td>";
                    
                    $content .= esc_html($id->author);
    
    
                    $content .="</td></tr>";
                    
                }
    
             
              $content .="</table>";
             
        
              return $content;



        }
        else{


            $items = lb_book_get_addresses($atts);
            
            $content .= "<table id='customers'>
            <tr>
              <th>ID</th>
              <th>Book</th>
              <th>Genre</th>
              <th>Author</th>
            </tr>
            ";
    
           $content .="<tr>";
            
            foreach($items as $id ){
                $content .="<tr><td>";
                
                $content .= esc_html($id->id);


                $content .="</td>";

                $content .="<td>";
                
                $content .= esc_html($id->book_name);


                $content .="</td>";

                $content .="<td>";
                
                $content .= esc_html($id->genre);


                $content .="</td>";

                $content .="<td>";
                
                $content .= esc_html($id->author);


                $content .="</td></tr>";
                
            }

         
          $content .="</table>";
         
    
          return $content;
          

        }


        
    
    }
}