<?php require_once("../../core/init.php");

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* 
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    GNU-GPL
* @version    1.0
* @link       http://sennasoft.com
*/

isset($_GET['getdata']) ? $request = $_GET['getdata'] : $request = '';

$output  	= array('data' => array());
switch($request)
{		
	default:echo $modules->notifikasi($level,$module,$action);break;	
	case 'tat_read':	
		$objects	= $generates->read_all($tabel ="t_tat");
		foreach($objects as $object_data)
		{
      $dari 	  = $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data['kd_konter']);
      $ke 	    = $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data['kd_tujuan']);
			$output['data'][] = array(
			'',
			$object_data['id_surat'],      
			strtoupper($object_data['no_surat']),      
			strtoupper($object_data['tgl_surat']),
			strtoupper($dari['nama_konter']),
			strtoupper($ke['nama_konter']),
			strtoupper($object_data['ekspedisi']),      
			strtoupper($object_data['nm_kontak']) .  " / " .	strtoupper($object_data['no_hp']));	
		}
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_tat.php
* Location: ../mod_tat/x_mod_tat.php
*/