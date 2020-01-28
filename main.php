<?php

$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on'");
$banyakBanner = mysqli_num_rows($queryBanner);
$noIndicatorBanner = '0';
$no = '1';

?>
<div class="animated fadeIn m-0">
	<div class="row">
		<div class="col col-md-12 bg-white">
			<div class="col-sm-12 p-1">
				<form class="col-sm-4 m-0 px-0 py-2 float-right" action="" method="POST">
					<div class="input-group">
						<div class="input-group-btn">
							<button class="btn btn-primary" name="cari">
								Search
							</button>
						</div>
						<input type="text" id="input1-group2" name="isi" placeholder="search ..." class="form-control">
					</div>
				</form>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php while ($rowBanner = mysqli_fetch_assoc($queryBanner)) : ?>
						<li data-target="#carouselExampleIndicators" data-slide-to="<?= $noIndicatorBanner ?>" class="<?php if ($noIndicatorBanner == '0') {
																															echo "active";
																														} ?>"></li>
					<?php $noIndicatorBanner++;
					endwhile ?>
				</ol>
				<div class="carousel-inner">

					<?php
					while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {

					?>
						<div class="carousel-item <?php if ($no == '1') {
														echo "active";
													} ?>">
							<img src="images/banner/<?= $rowBanner['gambar']  ?>" class="d-block w-100 h-100" alt="...">
						</div>
					<?php $no++;
					}	?>
					<!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<?php

			if ($kategori_id) {
				$kategori_id = "AND barang.kategori_id='$kategori_id'";
			}

			$pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
			$data_perhalaman = 12;
			$mulai_dari = ($pegination - 1) * $data_perhalaman;

			$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id WHERE barang.status='on' $kategori_id ORDER BY rand() DESC LIMIT $mulai_dari, $data_perhalaman");

			$no = 1;

			if (isset($_POST['cari'])) {
				$isi = htmlspecialchars($_POST["isi"]);
				$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id WHERE barang.barang_id LIKE '%$isi%' || barang.nama_barang LIKE '%$isi%'  $kategori_id ORDER BY rand() DESC LIMIT $mulai_dari, $data_perhalaman");
			}
			while ($row = mysqli_fetch_assoc($query)) {

				$kategori = strtolower($row["kategori"]);
				$barang = strtolower($row["nama_barang"]);
				$barang = str_replace(" ", "-", $barang);

				echo "<div class='col-6 col-lg-3 bg-white p-1'>
						<div class='card'>
						<div class='card-body'>					
							<div class='gambar-produk '>
								<a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>
									<img src='" . BASE_URL . "images/barang/$row[gambar]' class='img-thumbnail'>
								</a>
								</div>
								<div class='keterangan-gambar'>
									<div class='nama-barang text-center'>
										<a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a>
									</div>
								<p class='price'>" . rupiah($row['harga']) . "</p>
								<div class='text-right '>stok : " . $row["stok"] . "</div>
								</div>
								<div class='button-add-cart'>
									<a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>
										<i class='fa fa-shopping-cart mr-2'></i> 
										add to cart
									</a>
								</div>
							</div>
							</div>
						</div>";
			}
			?>
		</div>
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

		echo "<nav>
				<ul class='pagination'>";

		if ($pegination > 1) {
			$pref = $pegination - 1;
			echo "<li class='page-item'>
							<a href='" . BASE_URL . "index.php?pegination=$pref'>
								<span class='page-link'>Previous</span>
							</a>
							</li>";
		}

		for ($i = 1; $i <= $total_halaman; $i++) {
			if ($pegination == $i) {
				echo "<li class='page-item active'>
							<a class='page-link' href='" . BASE_URL . "index.php?pegination=$i'>$i
							</a>
						</li>";
			} else {
				echo "<li class='page-item'>
							<a class='page-link' href='" . BASE_URL . "index.php?pegination=$i'>$i</a>
						</li>";
			}
		}
		if ($pegination < $total_halaman) {
			$next = $pegination + 1;
			echo "<li><a class='page-link' href='" . BASE_URL . "index.php?pegination=$next'> next</a></li>";
		}
		echo "</ul>
				</nav>";
	}
	?>
</div>