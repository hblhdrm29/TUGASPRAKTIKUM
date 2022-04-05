<?php
include('../pbws4praktikum/tugas6/data/koneksi.php');

$id = $_GET['id'];


$sql = "SELECT * FROM krs WHERE id=$id";
$query = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($query);
