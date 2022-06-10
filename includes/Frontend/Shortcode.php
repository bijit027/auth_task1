<?php

namespace Library\System\Frontend;


/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'library-code', [ $this, 'render_shortcode' ] );
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

  
                $content = "<table>
                <tr>
                  <th>ID</th>
                  <th>Book</th>
                  <th>Genre</th>
                  <th>Author</th>
                </tr>
                <tr>";

           
        
        
                $content .="<td>";
        
               
                
                foreach($items as $id ){
                    
                    $content .= esc_html($id->id)."</br>";
                    
                }
                $content .="</td>";
        
                $content .="<td>";
                foreach($items as $name ){
                    $content .= esc_html($name->book_name)."</br>";
        
                }
                $content .="</td>";
        
                $content .="<td>";
                foreach($items as $genre ){
                    $content .= esc_html($name->genre)."</br>";
        
                }
                $content .="</td>";
        
                $content .="<td>";
                foreach($items as $author ){
                    $content .= esc_html($author->author)."</br>";
        
                }
                $content .="</td>";
        
        
             
              $content .="  </tr></table>";
        
              return $content;

             


        }
        else{


            $items = lb_book_get_addresses($atts);  
            $content = "<div class='new' ><table>
            <tr>
              <th>ID</th>
              <th>Book</th>
              <th>Genre</th>
              <th>Author</th>
            </tr>
            <tr>";
    
    
            $content .="<td>";
    
           
            
            foreach($items as $id ){
                
                $content .= esc_html($id->id)."</br>";
                
            }
            $content .="</td>";
    
            $content .="<td>";
            foreach($items as $name ){
                $content .= esc_html($name->book_name)."</br>";
    
            }
            $content .="</td>";
    
            $content .="<td>";
            foreach($items as $genre ){
                $content .= esc_html($genre->genre)."</br>";
    
            }
            $content .="</td>";
    
            $content .="<td>";
            foreach($items as $author ){
                $content .= esc_html($author->author)."</br>";
    
            }
            $content .="</td>";
    
    
         
          $content .="  </tr></table>";
          $content .=" </div> ";
    
          return $content;
          

        }


        
    
    }
}