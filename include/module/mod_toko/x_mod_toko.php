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
	case 'toko_read':	
		$objects	= $generates->read_all($tabel="t_toko");
		foreach($objects as $object_data)
		{
			$output['data'][] = array(
			'',
			strtoupper($object_data['kd_toko']),
			strtoupper($object_data['nama_toko']),
			strtoupper($object_data['alamat_1'] . ' ' . $object_data['alamat_2'] . ' ' . $object_data['alamat_3'] ),
			strtoupper($object_data['Kota']),
			'<button type="button" name="toko_print" id="'.strtolower($object_data['kd_toko']).'" class="toko_print btn btn-default btn-xs"><span class="glyphicon glyphicon-print"></span></button>' .
			'<button type="button" data-toggle="modal" data-target="#myModal" act="../modal/toko.avx" name="toko_edit" id="'.strtolower($object_data['kd_toko']).'" class="toko_edit btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>');	
		}
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_toko.php
* Location: ../mod_toko/x_mod_toko.php
*/