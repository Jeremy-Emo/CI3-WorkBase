<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function setLogin($userId) {
  //Initialisation des variables de session nécessaires
  $this->session->set_userdata('logged', TRUE);
  $this->session->set_userdata('userId', $userId);
}

function disconnect() {
  //Déconnexion
  $this->session->sess_destroy();
}
