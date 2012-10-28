<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/**
 * User specific constants
 */
// define ('ADMINURL',SITEURL.'/backoffice');
define ('ADMINFOLDER', 'backoffice');
define ('UPLOAD_DIR', 'uploads');
define ('PRODUCTS_DIR', 'products');
define ('DOCUMENTS_DIR', 'documents');
define ('THUMBS_DIR', 'thumbs');


//URL'S
define('PROD_IMG_PATH', UPLOAD_DIR . "/" . PRODUCTS_DIR . "/");
define('PROD_THUMB_IMG_PATH', UPLOAD_DIR . "/" . PRODUCTS_DIR . "/" . THUMBS_DIR . "/");


// Social Share Details
define ('FB_PAGE', '');
define ('FB_APP_ID', '316879215000121');
define ('TWITTER_PAGE', '');
define ('GOOGLEPLUS_PAGE', '');
define ('PINTEREST_PAGE', '');


// Common Image Settings
define ('THUMB_EXT', 'thumb_');
define ('ALLOWED_IMG_TYPES', 'jpg|png|gif|jpeg');
define ('IMAGE_QUALITY', '100%');
define ('PRODUCT_IMAGE_WIDTH', '90');
define ('PRODUCT_IMAGE_HEIGHT', '100');




/* End of file constants.php */
/* Location: ./application/config/constants.php */