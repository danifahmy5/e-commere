<?php

if($user_id){
	header("location: ".BASE_URL );
}
?>
	<div class="card px-3 py-3">
		<div class="card-header">
			Halaman <strong>Login</strong>
		</div>
		<div class="card-body">
			<form class="px-3 py-3 col-md-7 mx-auto my-auto bg-light" action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">
				<?php
				
						$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

						if ($notif == true) {
						echo "<div class='notif'>Maaf, email atau password yang anda masukan tidak cocok</div>";
						}
					?>

						
				<div class="row form-group">
					<div class="col col-md-12">
					<label for="email">Username/E-mail</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input id="email" type="email" name="email" class="form-control" placeholder="email">
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-12">
					<label for="password">Password</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-lock"></i></div>
							<input id="password" type="password" name="password" class="form-control" placeholder="password">
						</div>
					</div>				
				</div>
				<div class="element-from">
					<span><input class="btn btn-primary" type="submit" value="sig-in" /></span>				
				</div>
			</form>
		</div>
		<div class="card-footer text-center">
			<span class="">Belum memiliki akun? buat </span><a class="color-red" href="<?= BASE_URL."register.html" ?>"><strong> disini</strong></a>
		</div>
	</div>