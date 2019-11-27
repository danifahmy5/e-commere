<?php 
	if ($user_id == false) {
		$_SESSION["proses_pesanan"] = true;
		header("location: ".BASE_URL."login.html");
		exit;
	}
 ?>

<div class="container-detail-pembelian">
	<div class="row">
		<div class="col-sm-6">
			<h4 class="detail-pengiriman text-center">Detai Order</h4>
			<div class="table-responsive p-3">		
				<table class="table table-dark">
					<tr class="table table-primary warna-header">
						<th class='kiri'>Nama Barang</th>
						<th class='tengah'>Qty</th>
						<th class='kanan'>Total</th>
					</tr>

					<?php
						$subtotal = 0;
						foreach ($keranjang as $key => $value) {
							$barang_id =$key;

							$nama_barang = $value['nama_barang'];
							$harga = $value['harga'];
							$quantity = $value['quantity'];

							$total = $quantity * $harga;
							$subtotal = $subtotal + $total;

							echo "<tr>
									<td class='kiri'>$nama_barang</td>
									<td class='tengah'>$quantity</td>
									<td class='kanan'>".rupiah($total)."</td>
								</tr>";

						}

						echo "<tr>
						        <td colspan='2' class='kanan'><b>Sub Total</b> (belum termasuk ongkir)</td>
						        <td class='kanan'><b>".rupiah($subtotal)."</b></td>
						    	</tr>";
					?>
				</table>
			</div>
		</div>
		<div class="col-sm-5 ml-3">
			<h4 class="detail-pengiriman text-center">Alamat Pengiriman Barang</h4>
			<div id="frame-form-pengiriman">
				<form class="px-3 py-3 mx-auto my-auto" action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
					
					<div class="form-group">
						<label>Nama Penerima</label>
						<span><input class="form-control" placeholder="masukan nama" type="text" name="nama_penerima"></span>
					</div>

					<div class="form-group">
						<label>Nomor tlp</label>
						<span><input class="form-control" placeholder="masukan nomor telepon" type="number" name="nomor_telepon"></span>
					</div>
					<div class="form-group">
						<label>Alamat Pengiriman</label>
						<span><textarea class="form-control" placeholder="masukan alamat lengkap" name="alamat"></textarea></span>
					</div>
					<div class="form-group">
						<label>Kota</label>
						<span>
							<select class="form-control" name="kota">
								<?php
									$query = mysqli_query($koneksi, "SELECT * FROM kota");

									while ($row=mysqli_fetch_assoc($query)) {
										echo "<option value='$row[kota_id]''>$row[kota] (".rupiah($row["tarif"]).")</option>";
									}
								?>
							</select>
						</span>				
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="kirim">
					</div>
				</form>
			</div>
		</div>

	</div>
</div>