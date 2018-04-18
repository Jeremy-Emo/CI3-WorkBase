<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Sessions extends CI_Migration
{

	public function up()
	{

		$sqls = array();

		$sqls[] = "
      CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
      );
      ALTER TABLE ci_sessions ADD PRIMARY KEY (id, ip_address);
		";


		foreach ($sqls as $sql)
		{
			$this->db->query($sql);
		}
	}

	public function down()
	{
	}

}
