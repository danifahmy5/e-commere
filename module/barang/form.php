<?php 

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

		$nama_barang = "";
		$kategori_id = "";
		$spesifikasi = "";
		$gambar = "";
		$harga = "";
		$status = "";
		$button = "Add";

	if ($barang_id) {
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);

		$nama_barang = $row['nama_barang'];
		$kategori_id = $row['kategori_id'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$status = $row['status'];
		$button = "Update";

		$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar di samping)";
		$gambar ="<img src='".BASE_URL."images/barang/$gambar' style='width: 200px;vertical-align: middle;' />";

	}
?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>
<div class="card px-2 py-2">
	<div class="card-body p-1">
		<form id="form1" action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Kategori</label>	
				<span>
					<select class="form-control" name="kategori_id">
						<?php
						    $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
						    while ($row=mysqli_fetch_assoc($query)) {
						    	echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
						    }
						?>   
					</select>
				</span>
			</div>
			<div class="form-group">
				<label>Nama Barang</label>		
				<span><input class="form-control" type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
			</div>
			<div style="margin-bottom: 10px";>
				<label style="font-weight: bold";>Spesifikasi</label>		
				<span><textarea   name="spesifikasi" id="editor"><p><?php echo $spesifikasi; ?></p></textarea></span>
			</div>
			<div class="form-group">
				<label>Harga</label>		
				<span><input class="form-control" type="text" name="harga" value="<?php echo $harga; ?>" /></span>
			</div>
			<label>Gambar Produk</label>
			<div class="form-group">		
				<span>
					<input type="file" name="file" /><?= $gambar ?> 
				</span>
			</div>
			<label>Status</label>
			<div class="form-group">
				<span>
					<input type="radio" name="status" class="ml-2" value="on" <?php if ($status == "on")  { echo "checked='true'";} ?> /> on
					<input type="radio" name="status" class="ml-2" value="off" <?php if ($status == "off") { echo "checked='false'";} ?> /> off
				</span>
			</div>
			<div class="form-group">
				<span><input class="btn btn-primary" type="submit" name="button" value="<?php echo $button; ?>" /> </span>
			</div>			
		</form>
	</div>
</div>

<script >
	CKEDITOR.replace("editor")
</script>