<?php if (!defined('AVX')) exit('No direct script access allowed');

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* $action berasal dari file modul.php
* $kdtbl untuk membuat trigger dataTable yang dipanggil script.js
* file ini dipanggil dari compile.php via routing.
* 
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    GNU-GPL
* @version    1.0
* @link       http://sennasoft.com
*/

switch($action)
{
	default:
		echo $modules->notifikasi($level,$module,$action);
	break;
	
	case 'masspg_read':		
		$bl 				= $_POST['bln_master_spg'];
		$th 				= $_POST['thn_master_spg'];
		$tabel			= 'spg_'.$th;
		$periode		= $generates->bulan_indo($bl) .' - '.$th;
		$sitemap		= 'Master SPG ( '. $periode . ' )';				
		
		if(!($generates->tableExists($tabel)) && $th == date('Y')):		
			$struct = "
			`id` int(10) AUTO_INCREMENT PRIMARY KEY,
			`tahun` int(4) NOT NULL,
			`bulan` int(2) NOT NULL,
			`kd_konter` varchar(7) NOT NULL,
			`no_surat` varchar(50) NOT NULL,
			`kat` enum('reg','event') NOT NULL DEFAULT 'reg'
			";			
			$generates->create_table($tabel,$struct);	
			$cek_bulan = $cek_tahun = TRUE;
		elseif(!($generates->tableExists($tabel)) && $th != date('Y')):
			$cek_bulan = $cek_tahun = TRUE;
		else:
			$cek_bulan 	= $generates->kd_exists('bulan',$tabel,$bl);
			$cek_tahun 	= $generates->kd_exists('tahun',$tabel,$th);
			
			$keluar = $generates->cek_spg_keluar(date('m'),date('Y'));
			$a 	= count($generates->cek_spg_keluar(date('m'),date('Y')));		
			/* backup an 
		//	for($i=0;$i<$a;$i++){
		//		$generates->create_master_spg($tabel, $th,$bl, $keluar[$i]['kd_konter'],	$keluar[$i]['no_surat'], $keluar[$i]['jenis']);
		//	}	
		*/
			
		endif;
		
		if(($cek_bulan === FALSE || $cek_tahun === FALSE) && $bl == date('m') && $th == date('Y') ):
			$dt = $generates->read_all_param('t_spg','status',$kd='aktif');
			$j 	= count($generates->read_all_param('t_spg','status',$kd='aktif'));		
			for($i=0;$i<$j;$i++){
				$generates->create_master_spg($tabel, $th,$bl, $dt[$i]['kd_konter'],	$dt[$i]['no_surat'], $dt[$i]['jenis']);
			}	
		endif;	
		
		$jenis		= 'masspg';
		$id_tabel	= 'tbl_mas_spg';	
		$param[]	= $bl;	
		$param[]	= $th;	
		$tblshow 	= $drawtables->drawing($jenis, $id_tabel, $sitemap,$param);
		echo '<div class="container" newTitle="' . $sitemap . '">';		
		echo $tblshow;
		echo '</div>';

	break;
	
	case 'masspg_pilih':
		$sitemap		= 'Master SPG';				
		$jenis			= "master-spg-pilih";
		$id_tabel 	= "master-spg-pilih";		
		
		$tblshow 	= $drawtables->drawing($jenis, $id_tabel, $sitemap);
		echo '<div class="container" newTitle="' . $sitemap . '">';		
		echo $tblshow;
		echo '</div>';
		
	break;
}

/**
* End of file v_mod_masspg.php
* Location: ../mod_masspg/v_mod_masspg.php
*/