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
$no_surat		= strtolower(strip_tags(addslashes(trim($_GET["no_surat"])))); 
$nm_spg		  = strtolower(strip_tags(addslashes(trim($_GET["nama"])))); 	
$no_hp		  = strtolower(strip_tags(addslashes(trim($_GET["nohp"])))); 	
$ekspedisi	= strtolower(strip_tags(addslashes(trim($_GET["ekspedisi"])))); 	
$dari_toko	= strtolower(strip_tags(addslashes(trim($_GET["dari_toko"])))); 	
$ke_toko	  = strtolower(strip_tags(addslashes(trim($_GET["ke_toko"])))); 	

switch($action)
{
	default:echo $modules->notifikasi($level,$module,$action);break;		
	case "tat_edit":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($dari_toko)
      && !empty($ekspedisi)
			&& !empty($nm_spg)
      && !empty($no_hp)
      && !empty($ke_toko))
		{
			$generates->update_tat($no_surat,	$tgl_surat,	$dari_toko,	$ke_toko,	$nm_spg, $no_hp,	$ekspedisi);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;	
	
	case "tat_create":	
		if(!empty($no_surat) 
      && !empty($tgl_surat)
      && !empty($dari_toko)
      && !empty($ekspedisi)
      && !empty($nm_spg)
      && !empty($no_hp)
      && !empty($ke_toko))
		{
			$generates->create_tat($no_surat,	$tgl_surat,	$dari_toko,	$ke_toko,	$nm_spg, $no_hp,	$ekspedisi);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
}

/**
* End of file y_mod_tat.php
* Location: ../mod_tat/y_mod_tat.php
*/