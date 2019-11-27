<?php


     $server = "localhost";
     $username = "root";
     $password = "";
     $database = "db_penjualan";


     $koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");