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
$no_surat		= strtolower(strip_tags(addslashes(trim($_GET["no_surat"])))); 
$tgl_surat	= date('y-m-d', strtotime($_GET["tgl_surat"])); 	
$nm_spg		  = strtolower(strip_tags(addslashes(trim($_GET["nama"])))); 	
$no_hp		  = strtolower(strip_tags(addslashes(trim($_GET["nohp"])))); 	
$ekspedisi	= strtolower(strip_tags(addslashes(trim($_GET["ekspedisi"])))); 	
$kd_konter	= strtolower(strip_tags(addslashes(trim($_GET["kd_toko"])))); 	

switch($action)
{
	default:echo $modules->notifikasi($level,$module,$action);break;		
	case "retur_create":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($nm_spg)
      && !empty($ekspedisi)
      && !empty($kd_konter))
		{
			$generates->create_retur($no_surat,	$tgl_surat,	$kd_konter,	$nm_spg,	$no_hp,	$ekspedisi);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;	
	
	case "retur_edit":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($nm_spg)
      && !empty($ekspedisi)
      && !empty($kd_konter))
		{
			$generates->update_retur($no_surat,	$tgl_surat,	$kd_konter,	$nm_spg,	$no_hp,	$ekspedisi);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
}

/**
* End of file y_mod_retur.php
* Location: ../mod_retur/y_mod_retur.php
*/