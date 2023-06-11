<?php 
session_start();
include('koneksi.php');

//Bobot
$W1	= 0.456;
//$_POST['keramahan'];
$W2	= 0.256;
//$_POST['menu'];
$W3	= 0.156;
//$_POST['parkir'];
$W4	= 0.090;
//= $_POST['wifi'];
$W5	= 0.040;
//= $_POST['harga'];

//Pembagi Normalisasi
function pembagiNM($matrik){
	for($i=0;$i<5;$i++){
		$pangkatdua[$i] = 0;
		for($j=0;$j<sizeof($matrik);$j++){
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = sqrt($dplus[$i]);
	}
	return $dplus;
}

function JarakImin($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = sqrt($dplus[$i]);
	}
	return $dplus;
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Sistem Pendukung Keputusan Penentuan Coffee Shop Terbaik</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png"> 	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="container">

				<div class="nav-wrapper">
					<ul class="left" style="margin-left: -52px;">
						<li><a href="index.php">Home</a></li>
						<li><a href="daftar_cafe.php">Daftar Coffee Shop</a></li>
						<li><a class="active" href="hasil.php">Perhitungan</a></li>
						<li><a href="tentang.php">Tentang</a></li>						
					</ul>
				</div>

			</div>
		</nav>
	</div>
	<!-- Body Start -->

	<!-- Daftar Coffe Shop Start -->
	<div style="background-color: #efefef">
		<div class="container">
			<div class="section-card" style="padding: 20px 0px">
				<!--   Icon Section   -->


				<center>
					<h5 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">HASIL REKOMENDASI COFFEE SHOP</h5>
					<h6 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Dengan Metode ROC dan TOPSIS</h6>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Keputusan</h5>
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
											while ($cafe=mysqli_fetch_array($query)) {
												$Matrik[$no-1]=array($cafe['keramahan_angka'],$cafe['menu_angka'],$cafe['parkir_angka'],$cafe['wifi_angka'],$cafe['harga_angka'] );
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $cafe['keramahan_angka'] ?></center></td>
													<td><center><?php echo $cafe['menu_angka'] ?></center></td>
													<td><center><?php echo $cafe['parkir_angka'] ?></center></td>
													<td><center><?php echo $cafe['wifi_angka'] ?></center></td>
													<td><center><?php echo $cafe['harga_angka'] ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</li>
				</ul>

				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Normalisasi "R"</h5>
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
											$pembagiNM=pembagiNM($Matrik);
											while ($cafe=mysqli_fetch_array($query)) {

												$MatrikNormalisasi[$no-1]=array($cafe['keramahan_angka']/$pembagiNM[0],
													$cafe['menu_angka']/$pembagiNM[1],
													$cafe['parkir_angka']/$pembagiNM[2],
													$cafe['wifi_angka']/$pembagiNM[3],
													$cafe['harga_angka']/$pembagiNM[4]);

													?>
													<tr>
														<td><center><?php echo "A",$no ?></center></td>
														<td><center><?php echo round($cafe['keramahan_angka']/$pembagiNM[0],6)?></center></td>
														<td><center><?php echo round($cafe['menu_angka']/$pembagiNM[1],6) ?></center></td>
														<td><center><?php echo round($cafe['parkir_angka']/$pembagiNM[2],6) ?></center></td>
														<td><center><?php echo round($cafe['wifi_angka']/$pembagiNM[3],6) ?></center></td>
														<td><center><?php echo round($cafe['harga_angka']/$pembagiNM[4],6) ?></center></td>
													</tr>
													<?php
													$no++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>

					<ul> 
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Bobot "W"</h5>
										<table class="responsive-table">
											<thead>
												<tr>
													<th><center>Value Kriteria Keramahan</center></th>
													<th><center>Value Kriteria Menu</center></th>
													<th><center>Value Kriteria Parkir</center></th>
													<th><center>Value Kriteria Wifi</center></th>
													<th><center>Value Kriteria Harga</center></th>
												</tr>
											</thead>
											<tbody>
												<!--count($W)-->
												<tr>
													<td><center><?php echo($W1);?></center></td>
													<td><center><?php echo($W2);?></center></td>
													<td><center><?php echo($W3);?></center></td>
													<td><center><?php echo($W4);?></center></td>
													<td><center><?php echo($W5);?></center></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<ul>
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Normalisasi Terbobot "Y"</h5>
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
												$pembagiNM=pembagiNM($Matrik);
												while ($cafe=mysqli_fetch_array($query)) {
													
													$NormalisasiBobot[$no-1]=array(
														$MatrikNormalisasi[$no-1][0]*$W1,
														$MatrikNormalisasi[$no-1][1]*$W2,
														$MatrikNormalisasi[$no-1][2]*$W3,
														$MatrikNormalisasi[$no-1][3]*$W4,
														$MatrikNormalisasi[$no-1][4]*$W5 );

														?>
														<tr>
															<td><center><?php echo "A",$no ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][3]*$W4,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][4]*$W5,6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>

						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
											<h5 style="margin-bottom: 16px; margin-top: -6px;">Matriks Solusi Ideal Positif "A+" dan Negatif "A-"
											</h5>
											<table class="responsive-table">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center></center></th>
														<th><center>Y1 (Benefit)</center></th>
														<th><center>Y2 (Benefit)</center></th>
														<th><center>Y3 (Benefit)</center></th>
														<th><center>Y4 (Benefit)</center></th>
														<th><center>Y5 (Cost)</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$NormalisasiBobotTrans = Transpose($NormalisasiBobot);
													?>
													<tr>
														<?php  
														$idealpositif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]),min($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y+" ?> </center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[3]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[4]),6));?>&nbsp(min)</center></td>
													</tr>
													<tr>
														<?php  
														$idealnegatif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]),max($NormalisasiBobotTrans[4]));
														?>
														<td><center><?php echo "Y-" ?> </center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[3]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[4]),6));?>&nbsp(max)</center></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>

						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 250px;margin-right: 250px;">
										<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Jarak Antara Nilai Terbobot terhadap Solusi Ideal Positif "D+" dan Negatif "D-" </h5>
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>D+</center></th>
														<th><center></center></th>
														<th><center>D-</center></th>
														<th><center></center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM cafe");
													$no=1;
													$Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
													$Dmin=JarakImin($idealnegatif,$NormalisasiBobot);
													while ($cafe=mysqli_fetch_array($query)) {

														?>
														<tr>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</li>
						</ul>


						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 320px;margin-right: 320px;">
										<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Nilai Preferensi untuk Setiap Alternatif (V) </h5>
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Nilai Preferensi "V"</center></th>
														<th><center>Nilai</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM cafe");
													$no=1;
													$nilaiV = array();
													while ($cafe=mysqli_fetch_array($query)) {
														
														array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
														?>
														<tr>
															<td><center><?php echo "V",$no ?></center></td>
															<td><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
														</tr>
														<?php
														$no++;
													}

													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 300px;margin-right: 300px;">
										<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Nilai Preferensi Tertinggi</h5>
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Nilai Preferensi Tertinggi</center></th>
														<th></th>
														<th><center>Alternatif Coffee Shop Terpilih</center></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<?php
														$testmax = max($nilaiV);
														for ($i=0; $i < count($nilaiV); $i++) { 
															if ($nilaiV[$i] == $testmax) {
																$query=mysqli_query($selectdb,"SELECT * FROM cafe where id_cafe = $i+1");
																?>
																<td><center><?php echo "V".($i+1); ?></center></td>
																<td><center><?php echo $nilaiV[$i]; ?></center></td>
																<?php while ($user=mysqli_fetch_array($query)) { ?>
																<td><center><?php echo $user['nama_cafe']; ?></center></td>
																<?php
															}
														}
													} ?>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<div class="row center" \>
						<a href="rekomendasi.php" id="download-button" class="waves-effect waves-light btn" style="margin-top: 0px">Hitung Rekomendasi Ulang</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Daftar Coffe Shop End -->

		<!-- Body End -->

		<!-- Footer Start -->
		<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
			<div class="container">
				<p align="center" style="color: #999">&copy; Copyright <strong><span>AMA</span></strong>. SPK Coffee Shop</p>
			</div>
		</div>
		<!-- Footer End -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('.parallax').parallax();
				$('.modal').modal();
			});
		</script>
	</body>
	</html>