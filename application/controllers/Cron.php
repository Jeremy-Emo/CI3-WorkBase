<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CLI_Controller {

    //CLI : php index.php cron purgeSessions

    public function purgeSessions()
    {
      $toutDeSuite = time();
      $delai = 43200; //12h
      $oldSessions = $toutDeSuite - $delai;
      $this->db->query("DELETE FROM ci_sessions WHERE `timestamp` < $oldSessions ");
    }

}
