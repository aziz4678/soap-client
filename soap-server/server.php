<?php
error_reporting(1);
include "Database.php";

$uri = 'http://192.168.56.136';

$options = array('uri'=>$uri);

$server = new SoapServer(NULL,$options);

$server->setClass('Database');

$server->handle();
?>