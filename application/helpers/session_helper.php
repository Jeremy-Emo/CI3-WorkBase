<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function setLogin($userId) {
  //Initialisation des variables de session nécessaires
  $CI =& get_instance();
  $CI->session->set_userdata('logged', TRUE);
  $CI->session->set_userdata('userId', $userId);
}

function disconnect() {
  //Déconnexion
  $CI =& get_instance();
  $CI->session->sess_destroy();
}
