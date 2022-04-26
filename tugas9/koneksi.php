<?php
$host     = 'localhost:';
$user     = 'root'; 
$password = '';  
$db       = 'restapi'; 
  
$con = mysqli_connect($host, $user, $password, $db);
if(!$con){
die("Gagal Terkoneksi");
}

?>