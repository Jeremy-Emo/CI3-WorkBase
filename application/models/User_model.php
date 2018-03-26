<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

  protected $table = 'users';

  public function __construct()
  {
    parent::__construct();
    //Id par défaut de la table
    $this->id_table = 'id';
  }


  public function isAdmin($userId)
  {
    //Vérifie si l'utilisateur authentifé est un administrateur du site
    $query = "SELECT * FROM user WHERE id_user = $userId";
    $res = $this->db->query($query);
    if($res->admin) {
      return true;
    } else {
      return false;
    }
  }

}
