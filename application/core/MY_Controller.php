<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
//Controller global héritant de la classe Controller de base de CodeIgniter

    public $currentController;

    public function __construct()
    {
      parent::__construct();

      //On récupère le controller en cours :
      $this->currentController = $this->uri->segment(1, 'home');
    }
}


class Public_Controller extends MY_Controller {
//Controller ne nécessitant pas d'authentification

    public function __construct()
    {
      parent::__construct();
      if(config_item('modeOff')){
        //Si le mode maintenance est activé :
        $msg = "<h1>SITE EN MAINTENANCE</h1>
                <p>Il sera de retour dès que possible.</p>";
        die($msg);
      }
    }

}


class Private_Controller extends Public_Controller {
//Controller nécessitant une authentification

    public function __construct()
    {
      parent::__construct();
      if( ! $this->session->userdata('logged') ){
  			redirect('/', 'refresh');
  		}
    }

}


class CLI_Controller extends CI_Controller {
//Controller accessible en ligne de commande uniquement (utilisation de scripts ou de tâches cron)

    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request() && ENVIRONMENT == 'production') {
            exit("CLI Only");
        }
    }
}
