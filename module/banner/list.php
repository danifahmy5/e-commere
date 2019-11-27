<?php 
    
 ?>
<div class="background-all border text-right p-2">
	<a class="btn btn-primary btn-sm" href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
</div>

<?php
    $pegination = isset($_GET["pegination"]) ? $_GET["pegination"] : 1;
    $data_perhalaman = 5;
    $mulai_dari = ($pegination-1) * $data_perhalaman;
        
    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id LIMIT $mulai_dari, $data_perhalaman");
        
    if(mysqli_num_rows($queryBanner) == 0){
        echo "<h3>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
        echo "<div class='table-responsive-sm card px-3 py-3'>
                <table class='table'>
                     <thead class='thead-dark'>";
            
            echo "<tr>
                    <th scope='col' class='text-center'>No</th>
                    <th scope='col'>Banner</th>
                    <th scope='col' class='text-left'>Link</th>
                    <th scope='col' class='text-center'>Status</th>
                    <th scope='col' class='text-center'>Action</th>
                 </tr>
                 </thead>";
            $no=1 + $mulai_dari;
            while($rowBanner=mysqli_fetch_array($queryBanner))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                        <td class='text-center'>$rowBanner[status]</td>
                        <td class='tengah'><a class='btn btn-primary btn-sm' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]"."'>edit</a></td>
                     </tr>";
                
                $no++;
            }
            
        echo "</table>
              </div>";
         $queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM banner");
    pegination($queryHitungKategori, $data_perhalaman, $pegination, "index.php?page=my_profile&module=banner&action=list");
    }
?>