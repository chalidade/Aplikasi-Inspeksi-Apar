<?php
include "data/koneksi.php";
session_start();
$username   = $_POST['username'];
$password   = $_POST['password'];
$inspektor  = "SELECT * FROM `inspektor` where nama_inspektor = '$username' AND password_inspektor = '$password' ";
$result     = mysqli_query($connect,$inspektor);

$apar       = mysqli_query($connect, "SELECT * FROM apar");
$total_apar = mysqli_num_rows($apar);

$apar       = mysqli_query($connect, "SELECT * FROM apar where kondisi = '1'");
$apar_baik  = mysqli_num_rows($apar);

$apar       = mysqli_query($connect, "SELECT * FROM apar where kondisi = '0'");
$apar_rsk   = mysqli_num_rows($apar);

$apar       = mysqli_query($connect, "SELECT * FROM inspeksi_apar");
$insp_all   = mysqli_num_rows($apar);

$apar       = mysqli_query($connect, "SELECT * FROM inspeksi_apar where status_inspeksi = '1'");
$insp_done  = mysqli_num_rows($apar);

$apar       = mysqli_query($connect, "SELECT * FROM inspeksi_apar where status_inspeksi = '0'");
$insp_yet   = mysqli_num_rows($apar);

if (mysqli_num_rows($result) != 0 || $_SESSION['id'] != '')
  {
  while ($row=mysqli_fetch_row($result))
    {
    $_SESSION['id']   = $row[0];
    $_SESSION['nama'] = $row[1];
    }

 ?>
 <!Doctype html>
 <html lang="en">

 <head>
 	<title>Dashboard | Aplikasi Inspeksi Apar</title>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 	<!-- VENDOR CSS -->
 	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
 	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
 	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
 	<script src="assets/Chart.bundle.js"></script>
 	<script src="assets/utils.js"></script>
 	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
 	<!-- MAIN CSS -->
 	<link rel="stylesheet" href="assets/css/main.css">
 	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
 	<link rel="stylesheet" href="assets/css/demo.css">
 	<!-- GOOGLE FONTS -->
 	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
 	<!-- ICONS -->
 	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
 	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
 </head>

 <body>
 	<!-- WRAPPER -->
 	<div id="wrapper">
 		<!-- NAVBAR -->
 		<nav class="navbar navbar-default navbar-fixed-top">
 			<div class="brand">
 				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
 			</div>
 			<div class="container-fluid">
 				<div class="navbar-btn">
 					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
 				</div>
 				<div id="navbar-menu">
 					<ul class="nav navbar-nav navbar-right">
 						<li class="dropdown">
 							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nama']." - (".$_SESSION['id'].")"; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
 							<ul class="dropdown-menu">
 								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
 								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
 							</ul>
 						</li>
 					</ul>
 				</div>
 			</div>
 		</nav>
    <!-- END NAVBAR -->
     <?php include "sidebar.php"; ?>
    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <!-- OVERVIEW -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Ringkasan Inspeksi Bulanan</h3>
              <p class="panel-subtitle">Periode: Oct 14, 2016 - Oct 21, 2016</p>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-bar-chart"></i></span>
                    <p>
                      <span class="number"><?php echo $total_apar; ?>	</span>
                      <span class="title"><a href="laporan.php">Total Apar</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-check"></i></span>
                    <p>
                      <span class="number"><?php echo $insp_done; ?></span>
                      <span class="title"><a href="laporan.php?kondisi=sudah">Sudah Inspeksi</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-times"></i></span>
                    <p>
                      <span class="number"><?php echo $insp_yet; ?></span>
                      <span class="title"><a href="laporan.php?kondisi=belum">Belum Inspeksi</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-pie-chart"></i></span>
                    <p>
                      <span class="number"><?php echo round($insp_done/($insp_done+$insp_yet)*100);echo "%"; ?></span>
                      <span class="title"><a href="#">Presentase</a></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                    <canvas id="myChart" style="width:100%"></canvas>
                </div>
                <div class="col-md-3">
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo round($insp_done/($insp_done+$insp_yet)*100);echo "%"; ?></span> <span class="percentage"></span>
                    <span class="info-label"><a href="laporan.php?kondisi=sudah">Sudah Dicek</a></span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo round($insp_yet/($insp_done+$insp_yet)*100);echo "%"; ?></span> <span class="percentage"></span>
                    <span class="info-label"><a href="laporan.php?kondisi=belum">Belum Dicek</a></span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo $insp_all; ?></span> <span class="percentage"> Appar</span>
                    <span class="info-label"><a href="#">Total Data</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END OVERVIEW -->


           <!-- OVERVIEW -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Ringkasan Kelayakan APAR</h3>
              <p class="panel-subtitle">Periode: Oct 14, 2016 - Oct 21, 2016</p>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-bar-chart"></i></span>
                    <p>
                      <span class="number"><?php echo $total_apar; ?>	</span>
                      <span class="title"><a href="laporan.php">Total Apar</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-check"></i></span>
                    <p>
                      <span class="number"><?php echo $apar_baik; ?></span>
                      <span class="title"><a href="data-apar.php?kondisi=baik">Kondisi Baik</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-times"></i></span>
                    <p>
                      <span class="number"><?php echo $apar_rsk; ?></span>
                      <span class="title"><a href="data-apar.php?kondisi=rusak">Kondisi Rusak</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-pie-chart"></i></span>
                    <p>
                      <span class="number"><?php echo round(($apar_baik/($apar_baik+$apar_rsk))*100);echo "%"; ?></span>
                      <span class="title"><a href="#">Presentase</a></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                    <canvas id="myChart1" style="width:100%"></canvas>
                </div>
                <div class="col-md-3">
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo round(($apar_baik/($apar_baik+$apar_rsk))*100);echo "%"; ?></span> <span class="percentage"></span>
                    <span class="info-label"><a href="data-apar.php?kondisi=baik">Presentase Baik</a></span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo round(($apar_rsk/($apar_baik+$apar_rsk))*100);echo "%"; ?></span> <span class="percentage"></span>
                    <span class="info-label"><a href="data-apar.php?kondisi=rusak">Presentase Rusak</a></span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number"><?php echo $total_apar; ?></span> <span class="percentage"> Appar</span>
                    <span class="info-label"><a href="#">Total Data</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END OVERVIEW -->
            </div>
          </div>
        </div>
      </div>

      <script>
      var ctx = document.getElementById("myChart1").getContext('2d');
      var a = "<?php echo $apar_baik; ?>";
      var b = "<?php echo $apar_rsk; ?>";
      var myChart1 = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ["Rusak", "Baik"],
              datasets: [{
                  label: '# of Votes',
                  data: [b, a],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
      </script>
      <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var a = "<?php echo $insp_done; ?>";
      var b = "<?php echo $insp_yet; ?>";
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ["Belum Dicek", "Sudah Dicek"],
              datasets: [{
                  label: '# of Votes',
                  data: [b, a],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
      </script>
      <!-- END MAIN CONTENT -->
    <?php include "footer.php"; ?>

<?php
} else {
  echo "<script>alert('Anda Harus Login Terlebih Dahulu | Pastikan Username Password Anda Benar');window.location = '../login.php';</script>";
  }
?>
