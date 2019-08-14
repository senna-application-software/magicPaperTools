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
	case 'masspg_read':
		if(!($generates->tableExists("spg_".$_GET['tahun']))):		
			$output['data'] = array();
		else:	
			$objects	= $generates->read_two_param("spg_".$_GET['tahun'],"bulan", $_GET['bulan'],"tahun", $_GET['tahun']);
			foreach($objects as $object_data)
			{
				$nm_ctr 	= $generates->read_fetch('t_konter','kd_konter',$object_data['kd_konter']);
				$nm_spg 	= $generates->read_fetch('t_spg','no_surat',$object_data['no_surat']);
				
				($nm_spg['tgl_keluar']) == 0 ? $tgl_keluar = "" : $tgl_keluar = $nm_spg['tgl_keluar'];
				
				$output['data'][] = array(
					strtoupper($object_data['tahun'].'-'.$object_data['bulan']),
					strtoupper($nm_ctr['nama_konter']),			
					strtoupper($nm_spg['nm_spg']),
					strtoupper($object_data['kat']),			
					strtoupper($nm_spg['status']),			
					strtoupper($nm_spg['tgl_tugas']),
					strtoupper($tgl_keluar),
					strtoupper($nm_spg['ttl']),
					strtoupper($nm_spg['alamat_spg']),
					strtoupper($nm_spg['no_hp']),
					strtoupper($nm_spg['rek_bca']),
					strtoupper($nm_spg['bca_an']),
					strtoupper($object_data['no_surat'])
				);	
			}
		endif;
		
		echo(json_encode($output));
	break;
}

/**
* End of file x_mod_masspg.php
* Location: ../mod_masspg/x_mod_masspg.php
*/