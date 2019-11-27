<?php
 	

    if ($user_id) {
    	$module = isset($_GET['module']) ? $_GET['module'] : false;
    	$action = isset($_GET['action']) ? $_GET['action'] : false;
    	$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
    }else{
    	header("location: ".BASE_URL."index.php?page=login");
    }

    admin_only($module, $level);

    include_once ("function/koneksi.php");
    $pesanan_id = mysqli_query($koneksi,"SELECT * FROM pesanan");
    $row = mysqli_fetch_assoc($pesanan_id);
 ?>   


<div class="card">
	<div class="card-body">
		<div class="col-sm-12">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
				<?php
					if ($level == "superadmin") {
						
					
				?>
						<li class="nav-item">
							<a <?php if($module == "kategori"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
						</li>
						<li class="nav-item">
							<a <?php if($module == "barang"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Barang</a>
						</li>
						<li class="nav-item">
							<a <?php if($module == "user"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">User</a>
						</li>
						<li class="nav-item">
							<a <?php if($module == "banner"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>">Banner</a>
						</li>
						<li class="nav-item">
							<a <?php if($module == "kota"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>">Kota</a>
						</li>
				<?php
					}
				?>
				<li class="nav-item">
					<a <?php if($module == "pesanan"){ echo "class='nav-link active show'"; }else{ echo "class='nav-link'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">Pesanan</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-sm-12">
		<?php

		    $file = "module/$module/$action.php";
		    if (file_exists($file)) {
		    	include_once($file);
		    }else{
		    	echo "<h3>Maaf. halaman tersebut tidak di temukan</h3>";
		    }
		 ?>   
	</div>
</div>