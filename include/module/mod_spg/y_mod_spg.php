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
$tgl_surat	= date('y-m-d', strtotime($_GET["tgl_surat"])); 	
$tgl_tugas	= date('y-m-d', strtotime($_GET["tgl_tugas"])); 
$tgl_keluar	= $_GET["tgl_keluar"];
empty($tgl_keluar) ? $tgl_keluar = "0000-00-00" : $tgl_keluar =  date('y-m-d', strtotime($_GET["tgl_keluar"]));
$no_surat		= strtolower(strip_tags(addslashes(trim($_GET["no_surat"])))); 
$nm_spg		  = strtolower(strip_tags(addslashes(trim($_GET["nama"])))); 	
$alamat_spg	= strtolower(strip_tags(addslashes(trim($_GET["alamat"])))); 	
$ttl		    = strtolower(strip_tags(addslashes(trim($_GET["ttl"])))); 	
$no_hp		  = strtolower(strip_tags(addslashes(trim($_GET["nohp"])))); 	
$rek_bca		= strtolower(strip_tags(addslashes(trim($_GET["norek"])))); 	
$bca_an		  = strtolower(strip_tags(addslashes(trim($_GET["bca_an"])))); 	
$kd_konter	= strtolower(strip_tags(addslashes(trim($_GET["kd_toko"])))); 	
$status_spg	= strtolower(strip_tags(addslashes(trim($_GET["status"])))); 	
$jenis_spg	= strtolower(strip_tags(addslashes(trim($_GET["jenis"])))); 	

switch($action)
{
	default:echo $modules->notifikasi($level,$module,$action);break;		
	case "spg_create":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($tgl_tugas)
      && !empty($nm_spg)
      && !empty($alamat_spg)
      && !empty($ttl)
      && !empty($kd_konter))
		{
			$generates->create_spg($no_surat,	$tgl_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$ttl,	$alamat_spg,	$no_hp,	$rek_bca,	$bca_an,$jenis_spg,$status_spg);
			$generates->create_master_spg('spg_'.date('Y'), date('Y'),date('m'), $kd_konter,	$no_surat, $jenis_spg);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
	
	case "spg_update":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($tgl_tugas)
      && !empty($nm_spg)
      && !empty($alamat_spg)
      && !empty($ttl)
      && !empty($kd_konter))
		{
			$generates->update_spg($tgl_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$ttl,	$alamat_spg,	$no_hp,	$rek_bca,	$bca_an, $jenis_spg, $status_spg, $id_surat=$no_surat,$tgl_keluar);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
}

/**
* End of file y_mod_spg.php
* Location: ../mod_spg/y_mod_spg.php
*/