<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function validateCaptcha() {
    //Validation du captcha google
      $captcha = $this->input->post('g-recaptcha-response');
  		$pk = $this->config->item('captchaPrivateKey');
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$pk."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
      if ($response . 'success' == true) {
          return TRUE;
      } else {
          return FALSE;
      }
    }
  
}
