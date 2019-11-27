<div class="table-responsive-sm warna-table">
	<?php
		$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
	if ($totalBarang == 0) {?>
	<div class="row">
		
		<div class=" text-center col-sm-12">
			<h5 class='p-2  '>Saat ini belum pesanan/barang di dalam keranjang belanja anda</h5>
			<a class=' m-5 btn btn-primary btn-lg' href='<?php echo BASE_URL."index.php";?>'>Klik di sini untuk belanja</a>
		</div>
	</div>
	<?php
	}else{
	$no=1;
	$subtotal = 0;
	foreach($keranjang as $barang_id => $value){
		$nama_barang = $value["nama_barang"];
		$quantity = $value["quantity"];
		$gambar = $value["gambar"];
		$harga = $value["harga"];
		$total = $quantity * $harga;
		$subtotal = $total + $subtotal;
	?>
	<div class="row">
		<div class="col-sm-12">
			<div class="bg-light p-2 m-2">
				<?php echo $nama_barang ?>
			</div>
			<div class="images-size">
				<img src='<?php echo BASE_URL."images/barang/$gambar"; ?>' height='100px' />
				<div class="float-right m-3">
					<input type='number' name='<?php echo $barang_id; ?>' value='<?php echo $quantity; ?>' class='update-quantity' />
				</div>
			</div>
			<div class="bg-light p-2 m-2">
				<b>harga</b> <?php echo rupiah($harga); ?>
				<div class="float-right">
					<a class='btn btn-primary btn-sm' href='<?php echo BASE_URL."hapus_item.php?barang_id=$barang_id";?> '>Hapus</a>
				</div>
			</div>
			
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-sm-12 border p-3">
			<div class="float-left">
				<b>Sub Total</b>
			</div>
			<div class="float-right">
				<b><?php echo rupiah($subtotal) ?></b>
			</div>
		</div>
		
	</div>
</table>
<div class="row">
	<div class="col-sm-12">
		<a class='btn btn-primary btn-sm float-left m-3' href='<?php echo BASE_URL."index.php";?>'>< lanjut Belanja</a>
		<a class='btn btn-primary btn-sm float-right m-3' href='<?php echo BASE_URL."index.php?page=data-pemesan"; ?>'>lanjut Pemesanan ></a>
	</div>
</div>
<?php } ?>
</div>
<script >
	
	$(".update-quantity").on("input", function(e){
		var barang_id = $(this).attr("name");
		var value = $(this).val();
		alert(value);
		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "barang_id="+barang_id+"&value="+value
		})
		.done(function(data) {
			location.reload();
		});
	});
</script>