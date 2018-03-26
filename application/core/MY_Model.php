<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

/* Extension de la classe Model de base de CodeIgniter.
Chaque classe héritant de celle-ci doit posséder un attribut $table de type private.
Celui-ci étant la table de la BDD associée. Le but est de ne pas multiplier les fonctions
où la seule différence est la table sur laquelle on execute les requêtes. */

  //On initialise la variable id_table, correspondant à l'id par défaut des tables
  protected $id_table = "";

  public function __construct()
  {
    parent::__construct();
    //Si l'id par défaut n'existe pas, on le nomme par défaut 'id'
    if( $this->id_table == "" )
    {
      $this->id_table = 'id';
    }
  }

  public function search($select = '*', $filter = array(), $limit = NULL, $offset = NULL)
  {
    /*Fonction de recherche sur la BDD en fonction de filtres.
    Ceux-ci ont la forme d'un array correspondant aux clauses where.
    Exemple :
    array('mail', 'a@a.fr') -> correspond à un SELECT * from xxx WHERE mail = 'a@a.fr'

    Dans le cas de plusieurs where :
    array(
      array('mail', 'a@a.fr'),
      array('nom', 'toto')
    ) -> correspond à SELECT * from xxx WHERE mail = 'a@a.fr' AND nom = 'toto' */

    $this->db->select($select);
    $this->db->from($this->table);
    if(is_array($filter[0])){
      foreach($filter as $where){
        $this->db->where($where[0], $where[1]);
      }
    } else {
      $this->db->where($filter[0], $filter[1]);
    }

    $this->db->limit($limit, $offset);
    $info = $this->db->get();
    return $info->result();
  }


  public function getById($id)
  {
    //Fonction de recherche en fonction d'un id
    $info = $this->db->query("SELECT * from {$this->table} WHERE {$this->id_table} = $id");
    return $info->result();
  }


  public function create($data)
  {
    //Fonction permettant d'insérer un array dans la table courante
    return $this->db->insert($this->table, $data);
  }


  public function myUpdate($set, $filter)
  {
    //Fonction de mide à jour dans la table courante. Les filtres sont les mêmes que dans la fonction search()
    $this->db->set($set);
    if(is_array($filter[0])){
      foreach($filter as $where){
        $this->db->where($where[0], $where[1]);
      }
    } else {
      $this->db->where($filter[0], $filter[1]);
    }
    return $this->db->update($this->table);
  }


  public function myDelete($filter)
  {
    //Fonction de suppression en fonction d'un filtre
    if(is_array($filter[0])){
      foreach($filter as $where){
        $this->db->where($where[0], $where[1]);
      }
    } else {
      $this->db->where($filter[0], $filter[1]);
    }
    return $this->db->delete($this->table);
  }


  public function deleteById($id)
  {
    //Fonction de suppression en fonction d'un id
    $this->db->where($this->id_table, $id);
    return $this->db->delete($this->table);
  }

}
