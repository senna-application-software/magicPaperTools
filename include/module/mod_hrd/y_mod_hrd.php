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
$tgl_masuk	= date('y-m-d', strtotime($_GET["tgl_masuk"])); 
$tgl_keluar	= date('y-m-d', strtotime($_GET["tgl_keluar"])); 
$jabatan		= strtolower(strip_tags(addslashes(trim($_GET["jab_kary"])))); 
$no_surat		= strtolower(strip_tags(addslashes(trim($_GET["no_surat"])))); 
$nama_kary	= strtolower(strip_tags(addslashes(trim($_GET["nama_kary"])))); 	
$nik_kary		= strtolower(strip_tags(addslashes(trim($_GET["nik_kary"])))); 	
$keterangan	= strtolower(strip_tags(addslashes(trim($_GET["keterangan"])))); 	



switch($action)
{
	default:echo $modules->notifikasi($level,$module,$action);break;		
	case "paklaring_create":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($tgl_masuk)
      && !empty($tgl_keluar)
      && !empty($nama_kary)
      && !empty($nik_kary))
		{
			$generates->create_paklaring($no_surat,	$tgl_surat,	$nama_kary,	$nik_kary,	$jabatan,	$tgl_masuk,	$tgl_keluar,	$keterangan);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
	
	case "paklaring_update":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($tgl_masuk)
      && !empty($tgl_keluar)
      && !empty($nama_kary)
      && !empty($nik_kary))
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
* End of file y_mod_hrd.php
* Location: ../mod_hrd/y_mod_hrd.php
*/