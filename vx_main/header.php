<?php if (!defined('AVX')) exit('No direct script access allowed');

$ses_id = $_COOKIE[session_name()];
$now_is = date('Y-m-d H:i:s');
$ip_add = $_SERVER['REMOTE_ADDR'];
$cek 		= $generates->kd_exists('ip_address','active_session',$ip_add);

if(empty($cek))
{
	$a = $generates->query("INSERT INTO active_session (session_id,ip_address,last_seen) VALUES('$ses_id','$ip_add','$now_is')");
}
else
{
	$a = $generates->query("UPDATE active_session SET session_id='$ses_id',last_seen='$now_is' WHERE ip_address = '$ip_add'");	
}

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* File diinclude oleh compile.php.
* 
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    MIT-License
* @version    1.0
* @link       http://sennasoft.com
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $data['desc'];?>">
	<meta name="author" content="<?php echo $data['auth']?>">
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<link rel='icon' type='image/gif' href="../<?php echo $data['icon']?>">
	<title><?php echo $data['title'];?></title>
	<link rel='stylesheet' type='text/css' href='../custome/css/plugin.css'>
	<link rel='stylesheet' type='text/css' href='../custome/css/local-font.css'>
	<link rel='stylesheet' type='text/css' href='../custome/css/main.css'>
	<link rel='stylesheet' type='text/css' href='../custome/css/dataTable-responsif.css'>  
	<link rel='stylesheet' type='text/css' href='../plugin/font-awesome/css/font-awesome.min.css'>
	<link rel='stylesheet' type='text/css' href="../plugin/bootstrap.3.3.7/css/bootstrap.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/DataTables-1.10.15/media/css/dataTables.bootstrap.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/DataTables-1.10.15/media/css/dataTables.rowGroup.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/DataTables-1.10.15/media/css/dataTables.select.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/DataTables-1.10.15/media/css/responsive.bootstrap.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/DataTables-1.10.15/media/css/buttons.bootstrap.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/select2-4.0.3/css/select2.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/datetimepicker/css/bootstrap-datetimepicker.min.css">
	<link rel='stylesheet' type='text/css' href="../plugin/ie10/css/ie10-viewport-bug-workaround.css">
</head>
<?php flush();?>
<body>