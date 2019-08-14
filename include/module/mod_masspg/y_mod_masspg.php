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

$action		  = $_GET["action"];
$tgl_surat	= date('Y-m-d', strtotime($_GET["tgl_surat"])); 	
$tgl_tugas	= date('Y-m-d', strtotime($_GET["tgl_tugas"])); 
$no_surat		= strtolower(strip_tags(addslashes(trim($_GET["no_surat"])))); 
$nm_spg		  = strtolower(strip_tags(addslashes(trim($_GET["nama"])))); 	
$alamat_spg	= strtolower(strip_tags(addslashes(trim($_GET["alamat"])))); 	
$ttl		    = strtolower(strip_tags(addslashes(trim($_GET["ttl"])))); 	
$no_hp		  = strtolower(strip_tags(addslashes(trim($_GET["nohp"])))); 	
$rek_bca		= strtolower(strip_tags(addslashes(trim($_GET["norek"])))); 	
$bca_an		  = strtolower(strip_tags(addslashes(trim($_GET["bca_an"])))); 	
$kd_konter	= strtolower(strip_tags(addslashes(trim($_GET["kd_toko"])))); 	

switch($action)
{
	default:echo $modules->notifikasi($level,$module,$action);break;		
	
	case "buat_master_spg":
			$dt = $generates->read_all_param('t_spg','status',$kd='aktif');
			$j = count($generates->read_all_param('t_spg','status',$kd='aktif'));
			$tabel = 'spg_'.date('Y');
			$tahun = date('Y');
			$bulan = date('m');
			echo $j;
			for($i=0;$i<$j;$i++){
				$generates->create_master_spg($tabel, $tahun,$bulan, $dt[$i]['kd_konter'],	$dt[$i]['no_surat'], $dt[$i]['jenis']);
			}
			//$generates->update_spg($tgl_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$ttl,	$alamat_spg,	$no_hp,	$rek_bca,	$bca_an, $id_surat=$no_surat);
			echo "sukses";
	break;
}

/**
* End of file y_mod_masspg.php
* Location: ../mod_masspg/y_mod_masspg.php
*/