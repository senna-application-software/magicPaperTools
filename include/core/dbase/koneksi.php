<?php

/**
* Koneksi ke database menggunakan PDO
*/

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'root',
	'password' 	=> 'yourpass',
	'dbname' 	=> 'surat'
);

try
{
	$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
	$db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
}
catch(PDOException $e)
{	
  die("Failed:<br> " . $e->getMessage());
}

/**
* End of file koneksi.php
* Location: ./dbase/koneksi.php
*/
