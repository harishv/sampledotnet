<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

   public function __construct()
   {
		parent::__construct();
   }

	public function index()
	{
		// $this->session->sess_destroy();
		$this->session->set_userdata(array('admin_user' => null));

		redirect(ADMINFOLDER, 'refresh');
	}

}

/* End of file loguot.php */
/* Location: ./application/controllers/backoffice/logout.php */
