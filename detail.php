<div class="row">
	<div class="col-sm-12">
		<div class="detail-barang">
		<?php
			$barang_id = $_GET['barang_id'];

			$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
			$row =mysqli_fetch_assoc($query);

			echo "<div class='detail-barang'>
			        <h2 class='card-title'>$row[nama_barang]</h2>
			        <div class='frame-gambar'>
			        	<img class='card-img img-thumbnail' src='".BASE_URL."images/barang/$row[gambar]'/>
			        </div>
			        <div>
			        	<span>".rupiah($row['harga'])."</span>
			        	<a class='btn btn-primary btn-sm float-right mt-4 mr-4' href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>
			        		<img class='mr-2 mb-1' src='".BASE_URL."images/cart.png'> 
							Masuk keranjang
			        	</a>
			        </div>

			        <div class='keterangan'>
			        	<b>Keterangan :</b> $row[spesifikasi]
			        </div>
			     </div>";
		?>
		</div>
	</div>
</div>