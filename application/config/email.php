<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * All E-mail's Body and Subject, E-mail settings are declared here.
 */

// Basic Email settings
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';
$config['validate'] = TRUE;
$config['priority'] = 1;

$config['protocol'] = 'smtp';
// $config['protocol'] = 'sendgrid';
$config['smtp_host'] = 'mail.avitprofessionals.com';
$config['smtp_user'] = 'support@avitprofessionals.com';
$config['smtp_pass'] = 'a^!tsuppo&t';
$config['mailtype'] = 'html';
$config['charset']  = 'utf-8';


/* End of file email.php */
/* Location: ./application/config/email.php */