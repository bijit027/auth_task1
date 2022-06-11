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

                
             /*   $content = "<head>
                <style>
                #customers {
                  font-family: Arial, Helvetica, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }
                
                #customers td, #customers th {
                  border: 1px solid #ddd;
                  padding: 8px;
                }
                
                #customers tr:nth-child(even){background-color: #f2f2f2;}
                
                #customers tr:hover {background-color: #ddd;}
                
                #customers th {
                  padding-top: 12px;
                  padding-bottom: 12px;
                  text-align: left;
                  background-color: #04AA6D;
                  color: white;
                }
                </style>
                </head>";

                */
  
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
            
            
        /*    $content = "<head>
                <style>
                #customers {
                  font-family: Arial, Helvetica, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }
                
                #customers td, #customers th {
                  border: 1px solid #ddd;
                  padding: 8px;
                }
                
                #customers tr:nth-child(even){background-color: #f2f2f2;}
                
                #customers tr:hover {background-color: #ddd;}
                
                #customers th {
                  padding-top: 12px;
                  padding-bottom: 12px;
                  text-align: left;
                  background-color: #04AA6D;
                  color: white;
                }
                </style>
                </head>"; */
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