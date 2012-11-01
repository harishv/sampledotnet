<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index";
$route['backoffice'] = ADMINFOLDER;
$route['404_override'] = '';

// $route['detail'] = "product/test";
$route['detail/(:num)'] = "product/test/$1";
$route['detail/(:num)/(:any)'] = "product/test/$1/$2";
$route['prod'] = "product/product_detail";

/**
 * Admin Routs
 */
$route['backoffice'] = "backoffice";
// Admin index
$route['backoffice/index'] = "backoffice/index";
$route['backoffice/index/(:any)'] = "backoffice/index/$1";
// Admin Login
$route['backoffice/login'] = "backoffice/login";
$route['backoffice/login/(:any)'] = "backoffice/login/$1";
// Admin Logout
$route['backoffice/logout'] = "backoffice/logout";
$route['backoffice/logout/(:any)'] = "backoffice/logout/$1";
// Admin Products
$route['backoffice/products'] = "backoffice/products";
$route['backoffice/products/(:any)'] = "backoffice/products/$1";
$route['backoffice/products/(:any)/(:any)'] = "backoffice/products/$1/$2";
// Admin Users
$route['backoffice/users'] = "backoffice/users";
$route['backoffice/users/(:any)'] = "backoffice/users/$1";
$route['backoffice/users/(:any)/(:any)'] = "backoffice/users/$1/$2";


/**
 * Front-end Routs
 */
// Index Controller
$route['index'] = "index";
$route['index/(:any)'] = "index/$1";
$route['index/(:any)/(:any)'] = "index/$1/$2";
// Login Controller
$route['login'] = "login";
$route['login/(:any)'] = "login/$1";
$route['login/(:any)/(:any)'] = "login/$1/$2";
$route['login/(:any)/(:any)/(:any)'] = "login/$1/$2/$3";
// Register Controller
$route['register'] = "register";
$route['register/(:any)'] = "register/$1";
$route['register/(:any)/(:any)'] = "register/$1/$2";
// Category Controller
$route['category'] = "category";
$route['category/(:any)'] = "category/$1";
$route['category/(:any)/(:any)'] = "category/$1/$2";
$route['category/(:any)/(:any)/(:any)'] = "category/$1/$2/$3";
// Product Controller
$route['product'] = 'product';
$route['product/(:any)'] = "product/$1";
$route['product/(:any)/(:any)'] = "product/$1/$2";
$route['product/(:any)/(:any)/(:any)'] = "product/$1/$2/$3";

// SEO friendly url's for Product detail page
$route['prod/(:any)/(:any)/(:any)'] = "product/seo_child_url/$1/$2/$3";
$route['prod/(:any)/(:any)'] = "product/seo_parent_url/$1/$2";


/**
 * Redirection of links to blog.sample.net site.
 */
$route['US/(:any)']	= "index/redirect_to_blog_catname/$1";
$route['page/(:num)']	= "index/redirect_to_blog_pagenum/$1";
$route['US/(:any)/page/(:num)']	= "index/redirect_to_blog_catname_pagenum/$1";
$route['(:any)/(:any)'] = "index/redirect_to_blog_page/$1/$2";
$route['(:any)/(:any)/(:any)'] = "index/redirect_to_blog_page/$1/$2/$3";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
