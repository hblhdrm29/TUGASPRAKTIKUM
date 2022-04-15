<?php
$host     = 'localhost:8585';
$user     = 'root'; 
$password = '';  
$db       = 'tugas7'; 
  
$con = mysqli_connect($host, $user, $password, $db);
if(!$con){
die("Gagal Terkoneksi");
}
