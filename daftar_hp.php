<?php 
session_start();
include('koneksi.php');
?>

<?php 
	if(isset($_POST["tambah_cafe"])){
		$nama		= $_POST["nama"];
		$keramahan	= $_POST["keramahan"];
		$menu       = $_POST["menu"];
		$parkir		= $_POST["parkir"];
		$wifi		= $_POST["wifi"];
		$harga		= $_POST["harga"];
		
		$keramahan_angka = $menu_angka = $parkir_angka = $wifi_angka = $harga_angka = 0;

		if($keramahan = 1){
			$keramahan_angka = 1;
		} 
		elseif($keramahan = 2){
			$keramahan_angka = 2;
		}
		elseif($keramahan = 3){
			$keramahan_angka = 3;
		}
		elseif($keramahan = 4){
			$keramahan_angka = 4;
		}
		elseif($keramahan =5 ){
			$keramahan_angka = 5;
		}


		if($menu = 1){
			$menu_angka = 1;
		} 
		elseif($menu = 2){
			$menu_angka = 2;
		}
		elseif($menu = 3){
			$menu_angka = 3;
		}
		elseif($menu = 4){
			$menu_angka = 4;
		}
		elseif($menu =5 ){
			$menu_angka = 5;
		}


		if($parkir = 1){
			$parkir_angka = 1;
		} 
		elseif($parkir = 2){
			$parkir_angka = 2;
		}
		elseif($parkir = 3){
			$parkir_angka = 3;
		}
		elseif($parkir = 4){
			$parkir_angka = 4;
		}
		elseif($parkir =5 ){
			$parkir_angka = 5;
		}


		if($wifi = 1){
			$wifi_angka = 1;
		} 
		elseif($wifi = 2){
			$wifi_angka = 2;
		}
		elseif($wifi = 3){
			$wifi_angka = 3;
		}
		elseif($wifi = 4){
			$wifi_angka = 4;
		}
		elseif($wifi =5 ){
			$wifi_angka = 5;
		}


		if($harga = 1){
			$harga_angka = 1;
		} 
		elseif($harga = 2){
			$harga_angka = 2;
		}
		elseif($harga = 3){
			$harga_angka = 3;
		}
		elseif($harga = 4){
			$harga_angka = 4;
		}
		elseif($harga =5 ){
			$harga_angka = 5;
		}

		$sql = "INSERT INTO `cafe` (`id_cafe`, `nama_cafe`, `keramahan_dari_pelayan`, `kelengkapan_menu`, `tempat_parkir_kendaraan`, `ketersediaan_wifi`, `harga`, `keramahan_angka`, `menu_angka`, `parkir_angka`, `wifi_angka`, `harga_angka`) 
				VALUES (NULL, :nama_cafe, :keramahan_dari_pelayan, :kelengkapan_menu, :tempat_parkir_kendaraan, :ketersediaan_wifi, :harga, :keramahan_angka, :menu_angka, :parkir_angka, :wifi_angka, :harga_angka)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':nama_cafe', $nama);
		$stmt->bindValue(':keramahan_dari_pelayan', $keramahan);
		$stmt->bindValue(':kelengkapan_menu', $menu);
		$stmt->bindValue(':tempat_parkir_kendaraan', $parkir);
		$stmt->bindValue(':ketersediaan_wifi', $wifi);
		$stmt->bindValue(':harga', $harga);
		$stmt->bindValue(':keramahan_angka', $keramahan_angka);
		$stmt->bindValue(':menu_angka', $menu_angka);
		$stmt->bindValue(':parkir_angka', $parkir_angka);
		$stmt->bindValue(':wifi_angka', $wifi_angka);
		$stmt->bindValue(':harga_angka', $harga_angka);
		$stmt->execute();
	}

	if(isset($_POST["hapus_cafe"])){
		$id_hapus_cafe = $_POST['id_hapus_cafe'];
		$sql_delete = "DELETE FROM `cafe` WHERE `id_cafe` = :id_hapus_cafe";
		$stmt_delete = $db->prepare($sql_delete);
		$stmt_delete->bindValue(':id_hapus_cafe', $id_hapus_cafe);
		$stmt_delete->execute();
		$query_reorder_id=mysqli_query($selectdb,"ALTER TABLE cafe AUTO_INCREMENT = 1");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Pemilihan Cafe</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

	
</head>
<body>
	<!-- <div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
									<li><a href="rekomendasi.php">REKOMENDASI</a></li>
									<li><a class="active" href="daftar_cafe.php">DAFTAR CAFE</a></li>
									<li><a href="#about">TENTANG</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div> -->

		<!-- Body Start -->

		<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
				    <li>
						<div class="row">
						<div class="card">
								<div class="card-content">
									<center><h4 style="margin-bottom: 0px; margin-top: -8px;">Daftar Cafe</h4></center>
									<table id="table_id" class="hover dataTablesCustom" style="width:100%">
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No </center></th>
													<th><center>Nama Cafe</center></th>
													<th><center>Keramahan dari Pelayan</center></th>
													<th><center>Kelengkapan Menu</center></th>
													<th><center>Tempat Parkir Kendaraan</center></th>
													<th><center>Ketersediaan Wifi</center></th>
													<th><center>Harga</center></th>
													<th><center>Hapus</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM cafe");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $data['nama_cafe'] ?></center></td>
													<td><center><?php echo $data['keramahan_dari_pelayan'] ?></center></td>
													<td><center><?php echo $data['kelengkapan_menu'] ?></center></td>
													<td><center><?php echo $data['tempat_parkir_kendaraan'] ?></center></td>
													<td><center><?php echo $data['ketersediaan_wifi'] ?></center></td>
													<td><center><?php echo $data['harga'] ?></center></td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_cafe" value="<?php echo $data['id_cafe'] ?>">
																<button type="submit" name="hapus_cafe" style="height: 32px; width: 32px;" class="btn-floating btn-small waves-effect waves-light red"><i style="line-height: 32px;" class="material-icons">remove</i></button>
															</form>
														</center>
													</td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
									
							</div>
							<a href="#tambah" class="btn-floating btn-large waves-effect waves-light teal btn-float-custom"><i class="material-icons">add</i></a>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Daftar hp Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Analisa Cafe</h5></center>
									<table class="responsive-table">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>Alternatif</center></th>
													<th><center>C1 (Benefit)</center></th>
													<th><center>C2 (Benefit)</center></th>
													<th><center>C3 (Benefit)</center></th>
													<th><center>C4 (Benefit)</center></th>
													<th><center>C5 (Cost)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM cafe");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['keramahan_angka'] ?></center></td>
													<td><center><?php echo $data['menu_angka'] ?></center></td>
													<td><center><?php echo $data['parkir_angka'] ?></center></td>
													<td><center><?php echo $data['wifi_angka'] ?></center></td>
													<td><center><?php echo $data['harga_angka'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hp End -->

	<!-- Modal Start -->
	<div id="tambah" class="modal" style="width: 40%; height: 100%;">
		<div class="modal-content">
			<div class="col s6">
					<div class="card-content">
						<div class="row">
							<center><h5 style="margin-top:-8px;">Masukan Cafe</h5></center>
							<form method="POST" action="">
								<div class = "row">
									<div class="col s12">

										<div class="col s6" style="margin-top: 10px;">
											<b>Nama</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="nama" type="text" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Keramahan</b>
										</div>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="ram">
												<!-- <option value = "" disabled selected>Kriteria RAM</option>  -->
												<option value = "1">1 Nilai</option>
												<option value = "2">2 Nilai</option>
												<option value = "3">3 Nilai</option>
												<option value = "4">4 Nilai</option>
												<option value = "5">5 Nilai</option>
											</select>
										</div>
										
										<div class="col s6" style="margin-top: 10px;">
										<b>Menu</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="ram">
												<!-- <option value = "" disabled selected>Kriteria RAM</option>  -->
												<option value = "1">1 Nilai</option>
												<option value = "2">2 Nilai</option>
												<option value = "3">3 Nilai</option>
												<option value = "4">4 Nilai</option>
												<option value = "5">5 Nilai</option>
											</select>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Parkir</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="memori">
												<!-- <option value = "" disabled selected>Kriteria Penyimpanan</option> -->
												<option value = "1">1 Nilai</option>
												<option value = "2">2 Nilai</option>
												<option value = "3">3 Nilai</option>
												<option value = "4">4 Nilai</option>
												<option value = "5">5 Nilai</option>
											</select>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Wifi</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="processor">
												<option value = "1">1 Nilai</option>
												<option value = "2">2 Nilai</option>
												<option value = "3">3 Nilai</option>
												<option value = "4">4 Nilai</option>
												<option value = "5">5 Nilai</option>
											</select>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Harga</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="kamera">
												<!-- <option value = "" disabled selected>Kriteria Kamera</option> -->
												<option value = "1">1 Nilai</option>
												<option value = "2">2 Nilai</option>
												<option value = "3">3 Nilai</option>
												<option value = "4">4 Nilai</option>
												<option value = "5">5 Nilai</option>
											</select>
										</div>

									</div>  
								</div> 
								<center><button name="tambah_cafe" type="submit" class="waves-effect waves-light btn teal" style="margin-top: 0px;">Tambah</button></center>	
							</form>
						</div>
					</div>
				</div>
			</div>
		<div style="height: 0px; "class="modal-footer">
          <a style="margin-top: -30px;" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
        </div>
	</div>
	<!-- Modal End -->

	<!-- Modal Start -->
	<div id="about" class="modal">
		<div class="modal-content">
			<h4>Tentang</h4>
			<p>Sistem Pendukung Keputusan Penentuan Coffee Shop ini menggunakan kombinasi metode ROC dan TOPSIS yang dibangun menggunakan bahasa PHP.
	  		Sistem ini dibuat sebagai Tugas Akhir Mata Kuliah Sistem Pendukung Keputusan Prodi D-IV Sistem Informasi Bisnis Politeknik Negeri Malang. <br>
			<br>
				1. Alifah Okta Nur Wardani<br>
				2. Aprilia Noor A'isyah <br>
				3. Mertha Indri Setya Putri 
			</p>
		</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
		</div>
	</div>
	<!-- Modal End -->

    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
      <div class="container">
        <p align="center" style="color: #999">&copy; Sistem Pendukung Keputusan Penentuan CoffeeShop</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  	$(document).ready(function(){
		$('.parallax').parallax();
		$('.modal').modal();
		$('#table_id').DataTable({
    		"paging": false
		});
	    });
	</script>
</body>
</html>