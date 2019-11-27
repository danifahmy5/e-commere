<?php

	$pesanan_id = $_GET["pesanan_id"];

?>
<div class="col-sm-12">
	<form action=<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
		<div class="form-group">
			<label>Nomor Rekening</label>
			<span><input class="form-control" type="text" name="nomor_rekening" /></span>
		</div>
		<div class="form-group">
			<label>Nama Account</label>
			<span><input class="form-control" type="text" name="nama_account" /></span>
		</div>
		<div class="form-group">
			<label>Tanggal Transfer (format: yyyy-mm-dd)</label>
			<span><input class="form-control" type="date" name="tanggal_transfer" /></span>
		</div>
		<div class="form-group">
			<span><input class="btn btn-success btn-sm" type="submit" value="Konfirmasi" name="button" /></span>
		</div>		
	</form>
</div>