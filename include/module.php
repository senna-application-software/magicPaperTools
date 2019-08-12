<?php if (!defined('AVX')) exit('No direct script access allowed');

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* File ini diinclude oleh content, dan bertindak sebagai swich/router 
* dari semua permintaan file.
* $levels dan $menues adalah array yang didefinisikan di file compile.php
* 
* $_GET['mod'] compile.php?mod=home
* $_GET['mod'] compile.php?mod=user
*
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    GNU-GPL
* @version    1.0
* @link       http://sennasoft.com
*/
isset($_GET['module']) ? $module = $_GET['module'] : $module = 'module-vxims-dir';
isset($_GET['action']) ? $action = $_GET['action'] : $action = 'module-vxims-act';

if($modules->cek_request_mod($module) === false)
{	echo $modules->notifikasi($level,$module,$action);}
else
{
	if($level == 'admin')
	{
		switch($module){
			default					  : echo $modules->notifikasi($level,$module,$action);break;
			case 'home'			  : require_once('module/mod_dashboard/home.php');break;
			case 'import'			: require_once('module/mod_import/v_mod_import.php');break;
			case 'konter'	    :	require_once('module/mod_konter/v_mod_konter.php');break;
			case 'toko'       :	require_once('module/mod_toko/v_mod_toko.php');break;
			case 'rekrut'     :	require_once('module/mod_rekrut/v_mod_rekrut.php');break;
			case 'spg'        :	require_once('module/mod_spg/v_mod_spg.php');break;
			case 'masspg'     :	require_once('module/mod_masspg/v_mod_masspg.php');break;
			case 'retur'      :	require_once('module/mod_retur/v_mod_retur.php');break;
			case 'tat'        :	require_once('module/mod_tat/v_mod_tat.php');break;
			case 'master'     :	require_once('module/mod_master/v_mod_master.php');break;
			case 'mkonter'    :	require_once('module/mod_master/v_mod_master.php');break;
			case 'mtoko'      :	require_once('module/mod_master/v_mod_master.php');break;
			case 'pak'  			:	require_once('module/mod_hrd/v_mod_hrd.php');break;
		}
	}
}

/**
* End of file module.php
* Location: ./include/module.php
*/
