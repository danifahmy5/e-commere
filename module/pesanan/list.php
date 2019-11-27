<?php

$pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
$data_perhalaman = 10;
$mulai_dari = ($pegination-1) * $data_perhalaman;

if ($level == "superadmin") {
	$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama, konfirmasi_pembayaran.nomor_rekening FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN konfirmasi_pembayaran ON pesanan.pesanan_id=konfirmasi_pembayaran.pesanan_id ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $mulai_dari, $data_perhalaman");
}else{
	$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama, konfirmasi_pembayaran.nomor_rekening FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN konfirmasi_pembayaran ON pesanan.pesanan_id=konfirmasi_pembayaran.pesanan_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");

}
if (mysqli_num_rows($queryPesanan) == 0) {
	echo "<h3>Saat ini belom ada data Pesanan</h3>";
}
else{

	echo "<div class='table-responsive-sm card px-3 py-3'>
			<table class='table'>
					<thead class='thead-dark'>
					<tr>
							<th scope='col' class='text-center'>No</th>
							<th scope='col''>Status</th>

							<th scope='col'>Nama</th>
							<th scope='col'>No rekening</th>
							<th scope='col' class='text-center'>Action</th>
					</tr>
				</thead>";

	$adminButton = "";
	while($row=mysqli_fetch_assoc($queryPesanan)) {
		if ($level == "superadmin") {
			$adminButton="<a class='btn btn-primary btn-sm mt-1' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update</a>";
		}
		$status = $row['status'];
		echo "<tr>
				<td class='text-center'>$row[pesanan_id]</td>
				<td class='text-left'>$arrayStatusPesanan[$status]</td>
				<td class='text-left'>$row[nama]</td>
				<td class='text-left'>$row[nomor_rekening]</td>
				<td class='text-center'>
					<a class='btn btn-success btn-sm mt-1' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail</a>
					$adminButton
				</td>
			</tr>";
	}
	echo "</table>
		</div>";
		if ($level == "superadmin") {
			$queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM pesanan");
			pegination($queryHitungKategori, $data_perhalaman, $pegination, "index.php?page=my_profile&module=pesanan&action=list");
		}
		
}

?>