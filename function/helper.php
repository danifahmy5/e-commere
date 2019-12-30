<?php

define("BASE_URL","http://localhost/e-commerce/");

 
 $arrayStatusPesanan[0] = "Menunggu Pembayaran";
 $arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
 $arrayStatusPesanan[2] = "Lunas";
 $arrayStatusPesanan[3] = "Pembayaran Di Tolak";


 function rupiah($nilai = 0){
 	$string = "Rp," . number_format($nilai);
 	return $string;
 }

 function kategori($kategori_id = false) {
 	global $koneksi;


		$string = "<ul class='sub-menu children dropdown-menu'>";
			
			
				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

				while ($row=mysqli_fetch_assoc($query)) {
					$kategori = strtolower($row['kategori']);
					if($kategori_id == $row['kategori_id']) {
						$string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
					}else{
						$string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
					}
				}
			
		$string .= "</ul>";

	return $string;
 }

 function admin_only($module, $level){
 	if($level != "superadmin"){
    	$admin_pages = array("kategori", "barang", "kota", "user", "banner");
    	if (in_array($module, $admin_pages)) {
    		header("location:".BASE_URL);
    	}
    }
 }
 function pegination($query, $data_perhalaman, $pegination, $url){
 	$total_data = mysqli_num_rows($query);
    $total_halaman = ceil($total_data / $data_perhalaman);

    $batasPosisiNomor = 6;
    $batasJumlahHalaman = 10;
    $mulaiPegination = 1;
    $batasAkhirPegination = $total_halaman;

    echo "<nav class='mt-2'>
            <ul class='pagination'>";

     if ($pegination > 1) {
     	$pref = $pegination - 1;
     	echo "<li class='page-item'>
                <a class='page-link' href='".BASE_URL."$url&pegination=$pref'>Previous</a>
              </li>";
     }

     if ($total_halaman >= $batasJumlahHalaman) {
	     if ($pegination > $batasPosisiNomor) {
	     	$mulaiPegination = $pegination - ($batasPosisiNomor - 1);
	     }
     	$batasAkhirPegination = ($mulaiPegination - 1) + $batasJumlahHalaman;
     	if ($batasAkhirPegination > $total_halaman) {
     		$batasAkhirPegination = $total_halaman;
     	}
     }
         for ($i=$mulaiPegination; $i <= $batasAkhirPegination; $i++) { 
            if ($pegination == $i) {
              echo "<li class='page-item active'>
                        <a class='page-link active' href='".BASE_URL."$url&pegination=$i'>$i</a>
                    </li>";
            }else{
              echo "<li class='page-item'>
                        <a class='page-link' href='".BASE_URL."$url&pegination=$i'>$i</a>
                    </li>";
            }

         }
         if ($pegination < $total_halaman) {
     			$next = $pegination + 1;
     			echo "<li  class='page-item'>
                        <a class='page-link' href='".BASE_URL."$url&pegination=$next'> next</a>
                      </li>";
     }
     		  echo "</ul>";

 }
 function search(){
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE barang.nama_barang LIKE '%$search%'";
    }
 }

?>