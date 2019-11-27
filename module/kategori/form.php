<?php

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$kategori = "";
	$status = "";
	$button = "Add";

	if ($kategori_id) {
	$querykategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
	$row = mysqli_fetch_assoc($querykategori);

	$kategori = $row['kategori'];
	$status = $row['status'];
	$button = "Update";

	}
?>    
<div class="card px-2 py-2">
	<div class="card-body p-1">
		<form class="bg-light p-2" action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">

			<div class="form-group">
				<label>Kategori</label>		
				<span><input placeholder="masukkan kategori" class="form-control" type="text" name="kategori" value="<?php echo $kategori; ?>" /></span>
			</div>
			<label>Status</label>
			<div class="form-group">
				<span>
					<input type="radio" class="ml-2" name="status" value="on" <?php if ($status == "on")  { echo "checked='true'";} ?> /> on
					<input type="radio" class="ml-2" name="status" value="off" <?php if ($status == "off") { echo "checked='true'";} ?> /> off
				</span>
			</div>

			<div class="submit">
				<span>
					<input class="btn btn-primary" type="submit" name="button" value="<?php echo $button; ?>" /> 
				</span>
			</div>	
		</form>
	</div>
</div>