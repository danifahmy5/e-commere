<?php

    session_start();
    include_once ("function/koneksi.php");
	include_once ("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
   
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level =  isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang =  isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);

   



?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>ORIDNAClothing</title>

		<link href="<?php echo BASE_URL."css/coba.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/css/bootstrap.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/banner.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/normalize.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/bootstrap.min.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/font-awesome.min.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/themify-icons.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/flag-icon.min.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/cs-skin-elastic.css";?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo BASE_URL."css/style.css";?>" type="text/css" rel="stylesheet"/>

		<script src="<?php echo BASE_URL."js/jquery-3.3.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

		<script>
		    $(function() {
		      $('#slides').slidesjs({
		        height: 350,
		        play: { auto : true,
		        		interval : 3000
		              },
		        navigation : false
		      });
		    });
		</script>

	</head>
	<body>
		
	 	<div class="container">
	 		<div class="about">
	 	     	<div class="header">
		      		<a class="logo-title" href="<?php echo BASE_URL; ?>">
		      			<img src="<?php echo BASE_URL."images/logo.png"?>">
		      		</a>
	      		<div class="menu modal-open">
	      			<div class="user float-left">
	      				<?php
	      				    if ($user_id){
	      				    	echo "Hi <b>$nama</b>,
	      				    	 <a href='".BASE_URL."index.php?page=my_profil&module=pesanan&action=list'> my_profil</a>
	      				    	 <a href='".BASE_URL."logout.php'>Logout</a>";
						    }else{
					                           echo "<a href='".BASE_URL."login.html'>Login</a>
					                                 <a href='".BASE_URL."register.html'>Register</a>";


						    }
         
	      				?>
	      			</div>
	      			 
	      			     <a href="<?php echo BASE_URL."keranjang.html";?>" class="button-keranjang float-right">
	      			      <img src="<?php echo BASE_URL."images/cart.png"?>"/> 
	      			      <?php 
	      			      		if($totalBarang != 0) {
	      			      			echo "<span class='total-barang'>$totalBarang</span>";
	      			      		}
	      			      ?>
	      	             </a>
	      		    </div>
			      	    <div id="content">
			      	    	<?php
			      	    	$filename = "$page.php";

			      	    	if (file_exists($filename)) {
			      	    		 include_once($filename);
			      	    		}else{
			      	    		 include_once("main.php");	
			      	    	}
			      	    	?>

			      	    </div>
	           <footer class="text-center">
	           		<div class="row">
	           			<div class="col-sm-12">
	           				 <p>&copy; copyright by Ori DNA Indonesia </p>
	           			</div>	
	           		</div>
	           </footer>  
	      	</div>
	    </div>
	</div>
</body>
</html>