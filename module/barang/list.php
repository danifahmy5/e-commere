<?php 
    
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE barang.nama_barang LIKE '%$search%'";
    }

 ?>
<div class="background-all modal-open border">
    <div class="float-left p-2">
        <form action="<?php echo BASE_URL.'index.php?page=my_profile&module=barang&action=list;' ?>" method="GET">
            <input type="hidden" name="page" value="<?php echo $_GET["page"];?>"/>
            <input type="hidden" name="module" value="<?php echo $_GET["module"];?>"/>
            <input type="hidden" name="action" value="<?php echo $_GET["action"];?>"/>
            <input type="text" name="search" value="<?php echo $search; ?>" />
            <input type="submit" value="search" class="button-search">
        </form>
    </div>
    <div class="float-right p-2">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="btn btn-primary btn-sm">+ Tambah Barang</a>
    </div>
</div>

<?php
    $pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
    $data_perhalaman = 10;
    $mulai_dari = ($pegination-1) * $data_perhalaman;

    $query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id $where ORDER BY nama_barang ASC LIMIT $mulai_dari, $data_perhalaman");

    if (mysqli_num_rows($query) == 0) {
    	echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
    }else{
    	echo "<div class='table-responsive-sm background-all border'>
                <table class='table'>
                     <thead class='thead-dark'>";

    	echo "<tr class='baris-title'>
    	          <th scope='col' class='text-center'>No</th>
    	          <th scope='col' class='text-left'>Barang</th>
                  <th scope='col' class='text-left'>Kategori</th>
                  <th scope='col' class='text-left'>Harga</th>
    	          <th scope='col' class='text-center'>Status</th>
    	          <th scope='col' class='text-center' colspan='2'>Action</th>
    	       </tr>
               </thead>";

    $no=1 + $mulai_dari;
    while ($row=mysqli_fetch_assoc($query)) {
    	echo "<tr>
    	          <td class='kolom-nomor'>$no</td>
    	          <td class='kiri'>$row[nama_barang]</td>
                  <td class='kiri'>$row[kategori]</td>
                  <td class='kiri'>".rupiah($row["harga"])."</td>
    	          <td class='tengah'>$row[status]</td>
    	          <td class='text-center'>
    	              <a class='btn btn-primary btn-sm mt-2' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>edit</a>
                      <a class='btn btn-danger btn-sm mt-2' href='".BASE_URL."delete_barang.php?id=".$row['barang_id']."'>delete</a>
                  </td>
    	      </tr> "; 

                $no++;         	
    	       }	       

    echo "</table>
            </div>";

    $queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM barang $where");
    pegination($queryHitungKategori, $data_perhalaman, $pegination, "index.php?page=my_profile&module=barang&action=list&$search_url");
}

?>