<?php
$db_host="localhost"; //localhost server 
$db_user="sql_mxspillstea_";	//database username
$db_password="1qa2ws#EDD";	//database password   
$db_name="sql_mxspillstea_";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}


$web_add = "https://mxspillstea.me/";

?>



