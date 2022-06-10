<?php
/**
 * Plugin Name:       Library System
 * Plugin URI:        https://abc.com/plugins/the-basics/
 * Description:       Plugin is made for practice
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bijit Deb
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       ls-bijit-plugin
 * Domain Path:       /languages
 */


 //don't call the file directly
 if ( !defined( 'ABSPATH' ) ) exit;


 require_once __DIR__ . '/vendor/autoload.php';


 final class Library{

    /**
     * plugin version
     * 
     * @var string
    */

    const version = '1.0';

    /**
     * Class constructor
    */

    private function __construct(){

        $this->define_constants();

        register_activation_hook( __FILE__,[$this,'activate'] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

    }

    /**
     * Initialize a singleton instance
     * 
     * @return \crud
    */

    public static function init(){

        static $instance = false;

        if( !$instance ){

            $instance = new self();
        }

        return $instance;
    }

    /**
     * define the required plugin constants
     * 
     * @return void
    */


    public function define_constants(){

        define( 'WP_LIBRARY_VERSION', self::version );
        define( 'WP_LIBRARY_FILE', __FILE__ );
        define( 'WP_LIBRARY_PATH', __DIR__ );
        define( 'WP_LIBRARY_URL', plugins_url('', WP_LIBRARY_FILE ) );
        define( 'WP_LIBRARY_ASSETS', WP_LIBRARY_FILE . '/assets' );


    }

    /**
     * Initialize the plugin
     * 
     * @return void
     */

     public function init_plugin(){

        

        new Library\System\Assets();

            if ( is_admin() ){

                new Library\System\Admin();
    
            } else { 
    
                new Library\System\Frontend();
    
            }
        

  
     }

     /**
      * Do stuff upon plugin activation
     */

     public function activate(){

        $installer = new Library\System\Installer();
        $installer->run(); 

     }

 }

  /**
      * Initialize the main page
      *
      *@return \Library
     */

    function library(){

        return Library::init();
    }

    library();