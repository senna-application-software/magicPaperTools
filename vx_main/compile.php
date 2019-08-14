<?php 

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* File ini sebagai 'backbone' atau induk semua file.
* 
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    MIT-License
* @version    1.0
* @link       http://sennasoft.com
*/

define('AVX', 'compile.php');

require_once("../include/core/init.php");	
require_once("../vxims.php");	

$log 		  = $_SESSION['loginkd'] = 'admin';
$levels 	= array('admin');
$level 		= $_SESSION['level'] = 'admin';
	/*
	$identitas = $generates->read_all('t_identitas');
	$me = array(
		'nama' 		=> $identitas[0]['nama'],
		'alamat' 	=> $identitas[0]['alamat'],
		'kota' 		=> $identitas[0]['kota'],
		'notelp' 	=> $identitas[0]['notelp'],
		'from' 		=> $identitas[0]['nama'] . $identitas[0]['alamat'] .  $identitas[0]['kota'] .  $identitas[0]['notelp']
	);
	array_push($data,$me);
	*/
require_once("header.php");
require_once("content.php");
require_once("footer.php");

/**
* End of file compile.php
* Location: ./vx_main/compile.php
*/