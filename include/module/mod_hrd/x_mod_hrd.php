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

$tabel		= "paklaring";
$output  	= array('data' => array());
switch($request)
{		
	default:echo $modules->notifikasi($level,$module,$action);break;	
	case 'paklaring_read':	
		$objects	= $generates->read_all($tabel);
		foreach($objects as $object_data)
		{
			$output['data'][] = array(
			$object_data['id_surat'],
			strtoupper($object_data['no_surat']),
			$object_data['tgl_surat'],
			strtoupper($object_data['nama']),
			strtoupper($object_data['nik']),
			strtoupper($object_data['jabatan']),
			strtoupper($object_data['tgl_masuk']),
			strtoupper($object_data['tgl_keluar']),
			strtoupper($object_data['keterangan']));	
		}
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_hrd.php
* Location: ../mod_spg/x_mod_hrd.php
*/