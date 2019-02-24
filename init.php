<?php

$config = array(
	'db.host' => '80.240.19.192',
	'db.login' => 'shtab',
	'db.password' => 'jmb7EekxAVByTRpxZ6',
	'db.name' => 'shtab',
);
//autoloader doesnt work here
//thats way DB class not found

$shtab_db = new DB($config['db.host'], $config['db.login'], $config['db.password'], $config['db.name']);


