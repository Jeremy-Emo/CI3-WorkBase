<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('hashPassword')) {
  //Hachage du mot de passe
  function hashPassword($str) {
    return password_hash($str, PASSWORD_DEFAULT);
  }
}


if (!function_exists('verifyPassword')) {
  //Vérification du mot de passe en fonction d'une adresse mail
  function verifyPassword($str, $mail) {
    $this->load->model('auth_model');
    if($info = $this->user_model->search('*', array('mail', $mail))){
      $hash = $info[0]->password;
      return password_verify($str, $hash);
    } else {
      return false;
    }
  }
}


if (!function_exists('generateToken')) {
  //Génère un token unique
  function generateToken() {
    return hash( 'md5', uniqid( date('Y-m-d H:i:s'), TRUE ) );
  }
}
