<?php 

    include_once ("function/koneksi.php");
    include_once ("function/helper.php");
    
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE kategori.kategori LIKE '%$search%'";
    }

 ?>

<div class="background-all modal-open border">
    <div class="float-left p-2">
        <form action="<?php echo BASE_URL.'index.php?page=my_profile&module=kategori&action=list;' ?>" method="GET">
            <input type="hidden" name="page" value="<?php echo $_GET["page"];?>"/>
            <input type="hidden" name="module" value="<?php echo $_GET["module"];?>"/>
            <input type="hidden" name="action" value="<?php echo $_GET["action"];?>"/>
            <input class="mt-1" type="text" name="search" value="<?php echo $search; ?>" />
            <input type="submit" value="search" class="button-search">
        </form>
    </div>
    <div class="float-right p-2">
	   <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>" class="btn btn-primary btn-sm">+ Tambah Kategori</a>
    </div>
</div>

<?php

    $pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
    $data_perhalaman = 5;
    $mulai_dari = ($pegination-1) * $data_perhalaman;
 
    $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori $where LIMIT $mulai_dari, $data_perhalaman");

    if (mysqli_num_rows($querykategori) == 0) {
    	echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{
    	echo "<div class='table-responsive-sm card px-3 py-3'>
                <table class='table'>
                     <thead class='thead-dark'>";

        	echo "<tr role='row'>
        	          <th scope='col' class='text-center'>No</th>
        	          <th scope='col' class='text-left'>Kategori</th>
        	          <th scope='col'>Status</th>
        	          <th scope='col' class='text-center
                      ' colspan='2'>Action</th>
        	       </tr>
                   </thead>";

    $no=1 + $mulai_dari;
    while ($row=mysqli_fetch_assoc($querykategori)) {
    	echo "<tr>
    	          <td class='kolom-nomor'>$no</td>
    	          <td class='kiri'>$row[kategori]</td>
    	          <td class='tengah'>$row[status]</td>
    	          <td class='text-center'>
    	              <a class='btn btn-primary btn-sm' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>edit</a>
                       <a class='btn btn-danger btn-sm' href='".BASE_URL."delete_kategori.php?id=".$row['kategori_id']."'>delete</a>
    	          </td>
    	      </tr> "; 

    $no++;         	
    	       }?>	       

   

            </table>
          </div>
<?php 
     $queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                pegination($queryHitungKategori, $data_perhalaman, $pegination, "index.php?page=my_profile&module=kategori&action=list&$search"); 
}

?>