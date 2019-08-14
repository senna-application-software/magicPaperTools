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

$tabel		= "t_spg";

$output  	= array('data' => array());
switch($request)
{		
	default:echo $modules->notifikasi($level,$module,$action);break;	
	case 'spg_read':	
		$objects	= $generates->read_all($tabel);
		foreach($objects as $object_data)
		{
      $nm_ctr 	= $generates->read_fetch($tabel='t_konter',$field='kd_konter',$object_data['kd_konter']);
			$output['data'][] = array(
			'',
			$object_data['id_surat'],
			strtoupper($object_data['no_surat']),
			strtoupper($nm_ctr['nama_konter']),
			strtoupper($object_data['tgl_surat']),
			strtoupper($object_data['nm_spg']),
			strtoupper($object_data['ttl']),
			strtoupper($object_data['alamat_spg']),
			strtoupper($object_data['status']),
			strtoupper($object_data['jenis']),
			strtoupper($object_data['no_hp']),
			strtoupper($object_data['rek_bca']),
			strtoupper($object_data['bca_an']),
			strtoupper($object_data['tgl_tugas']));	
		}
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_spg.php
* Location: ../mod_spg/x_mod_spg.php
*/