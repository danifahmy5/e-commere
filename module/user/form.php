<?php
      
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<div class="card px-2 py-2">
	<div class="card-body p-1">
		<form class="bg-light p-2" action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST">
			  
			<div class="form-group">
				<label>Nama Lengkap</label>	
				<span><input class="form-control"
				 type="text" name="nama" value="<?php echo $nama; ?>" /></span>
			</div>	

			<div class="form-group">
				<label>Email</label>	
				<span><input class="form-control"
				 type="text" name="email" value="<?php echo $email; ?>" /></span>
			</div>		

			<div class="form-group">
				<label>Phone</label>	
				<span><input class="form-control"
				 type="text" name="phone" value="<?php echo $phone; ?>" /></span>
			</div>	

			<div class="form-group">
				<label>Alamat</label>	
				<span><input class="form-control"
				 type="text" name="alamat" value="<?php echo $alamat; ?>" /></span>
			</div>		
			<label>Level</label>
			<div class="form-group">	
				<span>
					<input type="radio" class="ml-2" value="superadmin" name="level" <?php if($level == "superadmin"){ echo "checked"; } ?> /> Superadmin
					<input type="radio" class="ml-2" value="customer" name="level" <?php if($level == "customer"){ echo "checked"; } ?> /> Customer			
				</span>
			</div>	
			<label>Status</label>
			<div class="form-group">	
				<span>
					<input type="radio" class="ml-2" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
					<input type="radio" class="ml-2" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off		
				</span>
			</div>		
			  
			<div class="form-group">
				<span><input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary" ></span>
			</div>	
		</form>
	</div>
</div>