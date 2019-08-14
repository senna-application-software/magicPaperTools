<?php
	session_start();
  
	ini_set('memory_limit', '500M');
  
	ob_start(); 
  
	require_once("dbase/koneksi.php");
	
	function my_autoload($class)
	{   
		$filename = 'classes/'.$class.'.php';
		include_once $filename;
	}
	spl_autoload_register('my_autoload');
	try 
	{

    $drawtables	= new Drawtable($db);    
		$generates	= new Generate($db); 
		$modules	  = new Module($db); 
	} 
	catch (Exception $e) 
	{
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
/**
* End of file init.php
* Location: ./include/core/init.php
*/
