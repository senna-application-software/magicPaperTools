<?php 
$level = 'admin';
require_once("core/init.php");	
require_once("../vxims.php");	

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
		switch($module){
			default					: echo $modules->notifikasi($level,$module,$action);break;
			case 'konterstr': require_once('module/mod_print/mod_print_konter_str.php');break;
			case 'konter'		: require_once('module/mod_print/mod_print_konter.php');break;
			case 'toko'		  :	require_once('module/mod_print/mod_print_toko.php');break;
			case 'rekrut'		:	require_once('module/mod_print/mod_print_rekrut.php');break;
			case 'spg'  		:	require_once('module/mod_print/mod_print_spg.php');break;
			case 'retur' 		:	require_once('module/mod_print/mod_print_retur.php');break;
			case 'tat'  		:	require_once('module/mod_print/mod_print_tat.php');break;
			case 'paklaring':	require_once('module/mod_print/mod_print_paklaring.php');break;
		}
		
/**
* End of file module_print.php
* Location: ./include/module_print.php
*/
