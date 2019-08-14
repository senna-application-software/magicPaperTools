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
	case 'mkonter_read':	
		$no				= 1;
		$objects	= $generates->read_all($tabel='t_konter');
		foreach($objects as $object_data)
		{
			$output['data'][] = array(
			$no,
			strtoupper($object_data['kd_konter']),
			strtoupper($object_data['nama_konter']),
			strtoupper($object_data['alamat_1'] . ' ' . $object_data['alamat_2'] . ' ' . $object_data['alamat_3'] ),
			strtoupper($object_data['Kota']),
			'<button type="button" name="konter_print" id="'.$object_data['kd_konter'].'" class="konter_print btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>');	
			$no++;
		}
		echo(json_encode($output));
	break;	
	
	case 'txt_read':	
		$no				= 1;
		$objects	= $generates->read_all($tabel='t_teks');
		foreach($objects as $object_data)
		{
			$output['data'][] = array(
			$no,
			strtolower($object_data['jenis']),
			$object_data['header'],
			$object_data['body'],
			$object_data['footer'],
			'<button type="button" data-toggle="modal" data-target="#myModal"  name="text_edit" id="text_edit" class="text_edit btn btn-default btn-lg" dt_id="'.$object_data['jenis'].'" ><span class="glyphicon glyphicon-pencil"></span></button>');	
			$no++;
		}
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_master.php
* Location: ../mod_master/x_mod_master.php
*/
