<?php
       
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
       
    $button = "Add";
       
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
		$status = $row["status"];
    }   
?>
<div class="card px-2 py-2">
	<div class="card-body p-1">
		<form class="bg-light p-2" action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"?>" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Banner</label>	
				<span><input class="form-control" type="text" name="banner" value="<?php echo $banner; ?>" /></span>
			</div>	

			<div class="form-group">
				<label>Link</label>	
				<span><input class="form-control" type="text" name="link" value="<?php echo $link; ?>" /></span>
			</div>	   

			<div class="form-group">
				<label>Gambar <?php echo $keterangan_gambar; ?></label>	
				<span><input type="file" name="file" /><?php echo $gambar; ?></span>
			</div>	  
			<label>Status</label>
			<div class="form-group">	
				<span>
					<input type="radio" class="ml-2" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
					<input type="radio" class="ml-2" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off		
				</span>
			</div>	   
			   
			<div class="form-group">
				<span><input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary" /></span>
			</div>	
		</form>
	</div>
</div>