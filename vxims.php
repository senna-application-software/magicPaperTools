<?php
require_once('include/core/init.php');
$me = $generates->read_all('t_identitas');
$data 	= array(
	"desc"		=> "Cetak surat",
	"auth"		=> "Diana Sena Kurnia",
	"auth2"		=> "+avx",
	"icon"		=> "vxims.ico",
	"title"		=> "Magic Paper Tools",
	"version"	=> "1.0",
	"comName"	=> strtoupper($me[0]['nama']),
	"comAdd"	=> strtoupper($me[0]['alamat']),
	"comIcon"	=> "logo.jpg",
	"from"	  	=> "<p>" . strtoupper( $me[0]['nama'] . "<br/>" . $me[0]['alamat'] . " - ". $me[0]['kota'] ."<br/> TELP : " . $me[0]['notelp']) ."</p>",
	"nama"	  	=>  $me[0]['nama'],
	"alamat"	=>  $me[0]['alamat'],
	"kota"	  	=>  $me[0]['kota'],
	"notlp"	  	=>  $me[0]['notlp'],
	"fromRtl"	=> "<p> SAS <br/>JL. TAMAN PAHLAWAN NO.27 CISANINTEN - CISEWU - GARUT </p>",
	"myicon"	=> "logo.jpg",
	"footer"	=> " &copy; by SAS | Senna Application Software - ".date("Y")." All right reserved."
);
