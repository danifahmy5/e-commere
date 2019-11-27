<?php 
	include_once ("function/koneksi.php");
	include_once ("function/helper.php");


	$id = $_GET['id'];
	
	mysqli_query($koneksi,"DELETE FROM barang WHERE barang_id='$id'");
	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");

 ?>