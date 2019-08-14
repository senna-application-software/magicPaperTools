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

switch($_GET["action"])
{
	default:echo $modules->notifikasi($level,$module,$action);break;	
	
	case "konter_create":	
	case "konter_edit":	
    $kd_konter	= strtolower(strip_tags(addslashes(trim($_GET["kd_konter"])))); 
    $nm_konter	= strtolower(strip_tags(addslashes(trim($_GET["nm_konter"])))); 	
    $alamat1		= strtolower(strip_tags(addslashes(trim($_GET["alamat1"])))); 	
    $alamat2		= strtolower(strip_tags(addslashes(trim($_GET["alamat2"])))); 	
    $alamat3		= strtolower(strip_tags(addslashes(trim($_GET["alamat3"])))); 	
    $kota				= strtolower(strip_tags(addslashes(trim($_GET["kota"])))); 	
		$sts_ctr		= $_GET["sts_ctr"]; 	
    $tabel    	= "t_konter";
    $field    	= "kd_konter";
		$cek 				= $generates->kd_exists($field,$tabel,$kd_konter);
		
	if(!empty($kd_konter) && !empty($nm_konter)){
		if($_GET['action'] == "konter_edit")
		{		
			$generates->update_konter($kd_konter,$nm_konter,$alamat1,$alamat2,$alamat3,$kota,$sts_ctr);		
			echo "sukses";
		}
		else
		{
			if($cek === false){
				$generates->create_konter($kd_konter,$nm_konter,$alamat1,$alamat2,$alamat3,$kota,1);
				echo "sukses";
			}
			else
			{
				echo "gagal";
			}
		}
	}
	else
	{
		echo "gagal";
		echo "Data tidak lengkap";
	}	
	break;	
  
	case "toko_create":	
	case "toko_edit":	
    $kd_toko	  = strtolower(strip_tags(addslashes(trim($_GET["kd_toko"])))); 
    $nm_toko	  = strtolower(strip_tags(addslashes(trim($_GET["nm_toko"])))); 	
    $alamat1		= strtolower(strip_tags(addslashes(trim($_GET["alamat1"])))); 	
    $alamat2		= strtolower(strip_tags(addslashes(trim($_GET["alamat2"])))); 	
    $alamat3		= strtolower(strip_tags(addslashes(trim($_GET["alamat3"])))); 	
    $kota		    = strtolower(strip_tags(addslashes(trim($_GET["kota"])))); 	
    $tabel    	= "t_toko";
    $field    	= "kd_toko";
    
    $cek = $generates->kd_exists($field,$tabel,$kd_toko);
		if(!empty($kd_toko) && !empty($nm_toko))
		{
			if($_GET['action'] == "toko_edit")
			{		
				$generates->update_toko($kd_toko,$nm_toko,$alamat1,$alamat2,$alamat3,$kota);
				echo "sukses";
			}
			else
			{
				if($cek === false)
				{
					$generates->create_toko($kd_toko,$nm_toko,$alamat1,$alamat2,$alamat3,$kota);
					echo "sukses";
				}
				else
				{
					echo "gagal";
				}
			}
		}
		else
		{
			echo "gagal";
			echo "Data tidak lengkap";
		}	
	break;
	
	case "id_data":	//idnetitas kop amplop
    $nm_id	  	= strtolower(strip_tags(addslashes(trim($_GET["nm_id"])))); 
    $nm_old	  	= strtolower(strip_tags(addslashes(trim($_GET["nm_id_old"])))); 
    $alm_id	  	= strtolower(strip_tags(addslashes(trim($_GET["alm_id"])))); 	
    $kota_id		= strtolower(strip_tags(addslashes(trim($_GET["kota_id"])))); 	
    $telp_id		= strtolower(strip_tags(addslashes(trim($_GET["telp_id"])))); 	
    $tabel    	= "t_identitas";
    $field    	= "nama";
    
    $cek = $generates->kd_exists($field,$tabel,$nm_old);
		if(!empty($nm_id) && !empty($alm_id) && !empty($kota_id))
		{
			if($cek === false)
			{
				$generates->create_id($nm_id,$alm_id,$kota_id,$telp_id);
				echo "sukses";
			}
			else
			{	
				$generates->update_id($nm_id,$alm_id,$kota_id,$telp_id);
				echo "sukses";
			}
		}
		else
		{
			echo "gagal";
		}
	break;
	
	
	case "teks_edit":	//teks surat
    $jenis_teks	  = $_GET["jenis_teks"]; 
    $header_teks	= $_GET["header_teks"]; 
    $body_teks	  = $_GET["body_teks"]; 	
    $footer_teks	= $_GET["footer_teks"]; 	
    $tabel    		= "t_teks";
    $field    		= "jenis";
    
    $cek = $generates->kd_exists($field,$tabel,$jenis_teks);
		if(!empty($header_teks) && !empty($footer_teks))
		{
			$generates->update_teks($jenis_teks,$header_teks,$body_teks,$footer_teks);
			echo "sukses";
		}
		else
		{
			echo "gagal";
		}
	break;
}

/**
* End of file y_mod_master.php
* Location: ../mod_master/y_mod_master.php
*/