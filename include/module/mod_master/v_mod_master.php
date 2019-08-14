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
	
	case 'master_read':
		$id_tabel	= 'mtext';
		$jenis		= 'root_master';
		$sitemap	= 'Master';
		$tblshow 	= $drawtables->drawing($jenis, $id_tabel, $sitemap);
		echo '<div class="container maincontainer" newTitle="' . $sitemap . '">';				
		echo $tblshow;
		echo '</div>';
	break;
 
}

/**
* End of file v_mod_master.php
* Location: ../mod_master/v_mod_master.php
*/