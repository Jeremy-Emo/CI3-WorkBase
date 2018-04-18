<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

  protected $table = 'users';

  public function __construct()
  {
    parent::__construct();
    //Id par défaut de la table
    $this->id_table = 'id';
  }

}
