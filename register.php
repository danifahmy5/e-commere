<?php

if($user_id){
	header("location: ".BASE_URL);
}
?>
	<div class="card">
		<div class="card-header">
				Halaman <strong>Register</strong>
		</div>
			<div class="card-body">

			<form class="px-3 py-3 col-md-6 mx-auto my-auto bg-light" action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">
				<?php

					$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
					$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
					$email = isset($_GET['email']) ? $_GET['email'] : false;
					$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
					$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false; 

				?>

				<?php 
						$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

						if ($notif == "require") {
						echo "<div class='notif'>Maaf, kamu harus melengkapai from dibawah ini</div>";
						}elseif ($notif == "password") {
						echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama</div>";
						}elseif ($notif == "email") {
						echo "<div class='notif'>Maaf, email yang kamu masukan sudah terdaftar </div>";
						}
					?>

				<div class="form-grup">
					<label>Nama Lengkap</label>
					<span><input type="text" class="form-control" placeholder="masukan nama" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" /></span>
					
				</div>
				
				<div class="form-grup">
					<label>Email</label>
					<span><input type="email" class="form-control" placeholder="masukan email" name="email" value="<?php echo $email; ?>" /></span>
					
				</div>

				<div class="form-grup">
					<label>Nomor Telepon / Handphone</label>
					<span><input type="tel" class="form-control" placeholder="masukan nomor telepon" name="phone" value="<?php echo $phone; ?>" /></span>
					
				</div>

				<div class="form-grup">
					<label>Alamat </label>
					<span><textarea class="form-control" placeholder="masukan alamat" name="alamat"></textarea></span>
					
				</div>

				<div class="form-grup">
					<label>Password</label>
					<span><input type="password" class="form-control" placeholder="masukan password" name="password" /></span>
					
				</div>

				<div class="form-grup">
					<label>Re-type Password</label>
					<span><input type="password" class="form-control" placeholder="Re-type password" name="re_password" /></span>
					
				</div>

				<div class="form-grup">
					<span><input type="submit" class="btn btn-primary button" value="register" /></span>
					
				</div>
			</form>
		</div>
		<div class="card-footer text-center">
				<span class="">Sudah memiliki akun? Masuk </span><a class="color-red" href="<?= BASE_URL."login.html" ?>"><strong> disini</strong></a>
		</div>
	</div>