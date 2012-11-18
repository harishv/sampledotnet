<?php

/*
 * Cron file to do the following:
 * 1. Create new weekly allowance by adding the previous Kash remaining amount to current allowance amount 
 * 2. Add Kash Reward to kid's kashpile amount 
 * 3. Update necessary related tables
 */

// Define constants
define('HOST_NAME','localhost');
define('USER_NAME','root');
define('PASSWORD','abc123');
//define('PASSWORD','(kmbh^&thjKy7gs');
define('DATABASE','sample');


// Initialize variables






/* 
* MySQL connection
*/
$conn =  mysql_connect( HOST_NAME, USER_NAME, PASSWORD ) or
        die( 'Could not open connection to server' );

/* 
* MySQL DB Selection
*/
mysql_select_db( DATABASE, $conn ) or 
        die( 'Could not select database '. DATABASE );


$sQuery = "select * from products";

$rResult = mysql_query( $sQuery, $conn ) or die(mysql_error());

if(mysql_num_rows($rResult) > 0 ){
    while ( $aRow = mysql_fetch_assoc($rResult) )
    {
        $array_user_ids[] = $aRow;
    }

	
	if(!empty($array_user_ids)){
        foreach($array_user_ids as $key => $value){
		
			$product_id = $value['id'];
			$category_id = $value['category_id'];
			$status = $value['status_id'];
			$modified_at = $value['modified_at'];
			$country_ids = explode(',',$value['valid_countries']);
			foreach($country_ids as $country_key=>$country_values){

				 $query = "INSERT INTO prod_countries (prod_id,country_id,category_id,status_id,modified_at) VALUES (".$product_id.",".			$country_values.", ".$category_id.", ".$status.", '".$modified_at."')";
				 $result = mysql_query( $query);

			}
			

		}
	} 


}
