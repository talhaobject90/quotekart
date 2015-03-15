<?php
   /*
   Plugin Name: Quote-plugin
   Plugin URI: http://al-fikri.rhcloud.com
   Description: a plugin to create awesomeness and spread joy
   Version: 1.2
   Author: Mohammed Talha
   License: GPL2
   */

if(is_admin())
{
	new Paulund_Wp_List_Table();
}

/**
 * Paulund_Wp_List_Table class will create the page to load the table
 */
class Paulund_Wp_List_Table
{
	/**
	 * Constructor will create the menu item
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array($this, 'add_menu_example_list_table_page' ));
	}

	/**
	 * Menu item will allow us to load the page to display the table
	 */
	public function add_menu_example_list_table_page()
	{
		add_menu_page( 'Quotes', 'Quotes', 'manage_options', 'my_custom_menu_page', array($this, 'list_table_page') );
		//add_menu_page( 'Quotes', 'Quotes', 'manage_options', 'custompage', 'my_custom_menu_page', plugins_url( '	quote-plugin/images/icon.png' ), 6 );
	}

	/**
	 * Display the list table page
	 *
	 * @return Void
	 */
	public function list_table_page()
	{
		$exampleListTable = new Example_List_Table();
		$exampleListTable->prepare_items();
		?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Quotes</h2>
                <?php $exampleListTable->display(); ?>
            </div>
        <?php
    }
}
 
// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
 
/**
 * Create a new table class that will extend the WP_List_Table
 */
class Example_List_Table extends WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
 
        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );
 
        $perPage = 20;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);
 
        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );
 
        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
 
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }
 
    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = array(
            'id'          => 'ID',
            'useremail'       => 'User',
            'category' => 'Category',
            'date'        => 'Date',
            'no_of_quote'    => 'Quotes Recieved',
            'highest_amount'      => 'Highest Amt',
        		'lowest_amount'      => 'Lowest Amt',
        		'deal_amount'      => 'Deal Amt',
        		'payment_staus'      => 'Pay Status',
        		'deal_status'      => 'Quote Status'
        		
        );
 
        return $columns;
    }
 
    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }
 
    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns()
    {
        return array('id' => array('id', false),
        		'useremail' => array('useremail', false),
        		'category' => array('category', false),
        		'date' => array('date', false),
        		'no_of_quote' => array('no_of_quote', false),
        		'payment_staus' => array('payment_staus', false),
        		'deal_status' => array('deal_status', false),
        );
    }
 
    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data()
    {
    	
    	
    	$data = array();
    	global $wpdb;
    	
    	$quotes_array  = $wpdb->get_results("SELECT * FROM `wp_quotetable`;" ,  ARRAY_A);
    	
    	foreach($quotes_array as $row)
    	{
    		
        $data[] = array(
                    'id'          => $row['id'],
                    'useremail'       => $row['useremail'],
                    'category' => $row['category'],
                    'date'        => $row['date'],
                    'no_of_quote'    => $row['no_of_quotes'],
	        		'highest_amount'    => $row['highest_amount'],
    	    		'lowest_amount'    => $row['lowest_amount'],
        			'deal_amount'    => $row['deal_amount'],
        			'payment_staus'    => $row['payment_status'],
        			'deal_status'  =>$row['status']
                    );
 
    	}
    	
    	
    
    	
    	
    	
    	
      
 
  
 
        return $data;
    }
 
    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'id':
            case 'useremail':
            case 'category':
            case 'date':
            case 'no_of_quote':
            case 'highest_amount':
            case 'lowest_amount':
           	case 'deal_amount':
       		case 'payment_staus':
     		case 'deal_status':
                return $item[ $column_name ];
 
            default:
                return print_r( $item, true ) ;
        }
    }
 
    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = 'id';
        $order = 'asc';
 
        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby']))
        {
            $orderby = $_GET['orderby'];
        }
 
        // If order is set use this as the order
        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }
 
 
        $result = strnatcmp( $a[$orderby], $b[$orderby] );
 
        if($order === 'asc')
        {
            return $result;
        }
 
        return -$result;
    }
}
?>
