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
    <script type="text/javascript">
        
    </script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">

								<ul class="left" style="margin-left: -52px;">
                                    <li><a href="index.php">Home</a></li>
									<li><a href="daftar_cafe.php">Daftar Coffe Shop</a></li>
									<li><a class="active" href="rekomendasi.php">Rekomendasi</a></li>
									<li><a href="tentang.php">Tentang</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar Laptop Start -->
        <div style="background-color: #efefef">
            <div class="container">
                <div class="section-card" style="padding: 32px 0px 20px 0px">
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col s3">
                                </div>
                                <div class="col s6">      
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <center><h4>Perhitungan Bobot dengan Metode ROC</h4></center>
                                                <br>
                                                <form class = "col s12" method="POST" action="hasil.php">
                                                    <div class = "row">
                                                        <div class="col s12">
                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Jumlah Kriteria</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="kmlkri">
                                                                    <!-- <option value = "" disabled selected style="color: #eceff1;"><i>Jumlah Kriteria</i></option> -->
                                                                    <option value = "5">5</option>
                                                                </select>
                                                            </div>
                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Keramahan Dari Pelayan</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="keramahan">
                                                                    <!-- <option value = "" disabled selected style="color: #eceff1;"><i>Kriteria Keramahan</i></option> -->
                                                                    <option value = "0.456">0.456</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                            <b>Ketersediaan Menu</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="menu">
                                                                    <!-- <option value = "" disabled selected>Kriteria Menu</option> -->
                                                                    <option value = "0.256">0.256</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Tempat Parkir Kendaraan</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="parkir">
                                                                    <!-- <option value = "" disabled selected>Kriteria Parkir</option> -->
                                                                    <option value = "0.156">0.156</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Ketersediaan Wifi</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="wifi">
                                                                <!-- <option value = "" disabled selected>Kriteria Wifi</option> -->
                                                                    <option value = "0.090">0.090</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Harga</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="harga">
                                                                    <!-- <option value = "" disabled selected>Kriteria Harga</option> -->
                                                                    <option value = "0.040">0.040</option>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>  
                                                    <center><button type="submit" class="waves-effect waves-light btn" style="margin-bottom:-46px;">Hitung</button></center>	
                                                </form>       
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="col s3">
                                </div>
                            </div>
                        </li>
                    </ul>	     
                </div>
            </div>
        </div>
        <!-- Rekomendasi Coffe Shop End -->


    <!-- Body End -->

    <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
      <div class="container">
        <p align="center" style="color: #999">&copy; Copyright <strong><span>AMA</span></strong>. SPK Coffe Shop</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	  $(document).ready(function(){
	      $('.parallax').parallax();
          $('select').material_select();
          $('.modal').modal();
	    });
    </script>
</body>
</html>