<?php 
    
    $search = isset($_GET["search"]) ? $_GET["search"] : false;

    $where = "";
    $search_url = "";
    if ($search) {
        $search_url = "&search=$search";
        $where = "WHERE user.nama LIKE '%$search%'";
    }

 ?>
<div class="background-all modal-open border p-3">
    <div class="">
        <form action="<?php echo BASE_URL.'index.php?page=my_profile&module=user&action=list;' ?>" method="GET">
            <input type="hidden" name="page" value="<?php echo $_GET["page"];?>"/>
            <input type="hidden" name="module" value="<?php echo $_GET["module"];?>"/>
            <input type="hidden" name="action" value="<?php echo $_GET["action"];?>"/>
            <input type="text" name="search" value="<?php echo $search; ?>" />
            <input type="submit" value="search" class="button-search" />
        </form>
    </div>
</div>
<?php 
    
    $pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
    $data_perhalaman = 10;
    $mulai_dari = ($pegination-1) * $data_perhalaman;

    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user $where ORDER BY nama ASC LIMIT $mulai_dari, $data_perhalaman");
      
    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<div class='table-responsive-sm border background-all'>
                <table class='table'>
                     <thead class='thead-dark'>";
          
            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>Phone</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>
                 </thead>";
            $no=1 + $mulai_dari;
            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[phone]</td>
                        <td>$rowUser[level]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'><a class='btn btn-primary btn-sm' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]"."'>edit</a></td>
                     </tr>";
              
                $no++;
            }
          
        //AKHIR DARI TABLE
        echo "</table>
              </div>";

    $queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM user");
    pegination($queryHitungKategori, $data_perhalaman, $pegination, "index.php?page=my_profile&module=user&action=list&$search_url");
}
?>