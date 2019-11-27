<div class="row">
	<div class="col-sm-3">
		<?php

			echo kategori($kategori_id);

		?>
		
	</div>

	<div class="col-sm-9 modal-open">
		<div id="slides">
			
			<?php

				$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
				while($rowBanner=mysqli_fetch_assoc($queryBanner)) {
					echo "<a href ='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."images/slide/$rowBanner[gambar]' /></a>";
				}
			?>

		</div>
		<div class="frame-barang">
			<ul>
				
				<?php

					if($kategori_id) {
						$kategori_id = "AND barang.kategori_id='$kategori_id'";
					}

					$pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
				    $data_perhalaman = 12;
				    $mulai_dari = ($pegination-1) * $data_perhalaman;

					$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id WHERE barang.status='on' $kategori_id ORDER BY rand() DESC LIMIT $mulai_dari, $data_perhalaman" );

					$no=1;
					
					
					while($row=mysqli_fetch_assoc($query)) {

						$kategori = strtolower($row["kategori"]);
						$barang = strtolower($row["nama_barang"]);
						$barang = str_replace(" ", "-", $barang);
								
						echo "<li>
									<div class='gambar-produk '>
									<a href='".BASE_URL."$row[barang_id]/$kategori/$barang.html'>
										<img src='".BASE_URL."images/barang/$row[gambar]' class='img-thumbnail'>
									</a>
									</div>
									<div class='keterangan-gambar'>
										<p class='nama text-center'>
											<a href='".BASE_URL."$row[barang_id]/$kategori/$barang.html'>$row[nama_barang]</a>
										</p>
									<p class='price'>".rupiah($row['harga'])."</p>
										<span>stok : $row[stok]</span>
									</div>
									<div class='button-add-cart'>
										<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
									</div>
								</li>";
								
					}
				?>
			</ul>
		</div>
		<?php 
				if ($kategori_id == 0) {
				
					$queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM barang");
				    $total_data = mysqli_num_rows($queryHitungKategori);
				    $total_halaman = ceil($total_data / $data_perhalaman);

				    $batasPosisiNomor = 6;
				    $batasJumlahHalaman = 10;
				    $mulaiPegination = 1;
				    $batasAkhirPegination = $total_halaman;

				     echo "<ul class='pegination'>";

				     	if ($pegination > 1) {
						     	$pref = $pegination - 1;
						     	echo "<li><a href='".BASE_URL."index.php?pegination=$pref'><< prev</a></li>";
						     }

				         for ($i=1; $i <= $total_halaman; $i++) { 
				            if ($pegination == $i) {
				              echo "<li><a class='active' href='".BASE_URL."index.php?pegination=$i'>$i</a></li>";
				            }else{
				               echo "<li><a href='".BASE_URL."index.php?pegination=$i'>$i</a></li>";
				            }
				         }
				         if ($pegination < $total_halaman) {
				     			$next = $pegination + 1;
				     			echo "<li><a href='".BASE_URL."index.php?pegination=$next'> next >></a></li>";
				     		}
				     echo "</ul>";
				}
			 ?>
	</div>
</div>