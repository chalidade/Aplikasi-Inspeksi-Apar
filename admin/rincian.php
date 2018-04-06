<?php
include "header.php";
include "sidebar.php";
?>
<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- OVERVIEW -->
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Detail Appar</h3>
          <p class="panel-subtitle">Rincian data APAR</p>
        </div>
        <!-- TABLE HOVER -->
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr style="background-color:#656565;color:#fff;">
                  <th>Kode Apar</th>
                  <th>ID Inspektor</th>
                  <th>Tanggal Inspeksi</th>
                  <th> Status </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "data/koneksi.php";
                $kode        = $_REQUEST['kode'];
                $apar        = "SELECT * FROM `status_inspeksi` WHERE kode='$kode'";

                $result      = mysqli_query($connect,$apar);
                while ($row  = mysqli_fetch_row($result))
                  {
                    $kode = $row[1];
                    $sts  = $row[2];
                    $c    = $row[3];
                    $d    = $row[4];
                    $e    = $row[5];
                    $f    = $row[6];
                    $g    = $row[7];
                    $h    = $row[8];
                    $i    = $row[9];
                    $j    = $row[10];
                    $k    = $row[11];
                    $l    = $row[12];
                    $a    = $row[13];
                    $b    = $row[14];
                    $tgl  = $row[15];
                    $nama = $row[16];
                    $baik = $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l;
                    $krng = 12-$baik;

                ?>
                <tr>
                  <td><?php echo $kode; ?></td>
                  <td><?php echo $nama; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td>
                      <?php if($sts == 1) { ?>
                        <div class="done" style="width:70%">Siap Digunakan</div>
                      <?php } else { ?>
                        <div class="not"  style="width:70%">Butuh Perbaikan</div>
                      <?php } ?>
                  </td>
                <?php
                  }
                 ?>
              </tbody>
            </table>
            <hr>

            <!-- OVERVIEW -->
            <div class="panel panel-headline">
              <div class="panel-heading">
                <h3 class="panel-title">Ringkasan APAR</h3>
                <p class="panel-subtitle">Data ringkasan Apar dalam Diagram Venn</p>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-bar-chart"></i></span>
                      <p>
                        <span class="number"><?php echo round(($baik/12)*100); ?> %	</span>
                        <span class="title"><a href="laporan.php">Presentase Baik</a></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-check"></i></span>
                      <p>
                        <span class="number"><?php echo $baik; ?></span>
                        <span class="title"><a href="laporan.php?kondisi=sudah">Sesuai</a></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-times"></i></span>
                      <p>
                        <span class="number"><?php echo $krng; ?></span>
                        <span class="title"><a href="laporan.php?kondisi=belum">Tidak Sesuai</a></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="metric">
                      <span class="icon"><i class="fa fa-pie-chart"></i></span>
                      <p>
                        <span class="number"><?php echo round(($krng/12)*100); ?> %</span>
                        <span class="title"><a href="#">Presentase Kurang</a></span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                      <canvas id="myChart" style="width:100%"></canvas>
                  </div>
                  <div class="col-md-3">
                      <h4>Detail Ketidaksesuaian<h4>
                        <ul>
                          <?php if($c == 0){
                            echo "<li>Tabung APAR tidak berwarna merah</li>";
                          } else if($d == 0) {
                            echo "<li>Tabung APAR dalam kondisi tidak baik (Berkarat)</li>";
                          } else if($e == 0) {
                            echo "<li>Suhu ruangan melebihi atau kurang dari 49 derajat celcius</li>";
                          } else if($f == 0) {
                            echo "<li>Isi tabung tidak sesuai dengan berat yang telah ditentukan</li>";
                          } else if($g == 0) {
                            echo "<li>Cartridge dalam kondisi tidak boiler</li>";
                          } else if($h == 0) {
                            echo "<li>Mulut pancar tersumbat</li>";
                          } else if($i == 0) {
                            echo "<li>Pipa pancar tidak dalam kondisi baik</li>";
                          } else if($j == 0) {
                            echo "<li>Handel dan label tidak dalam kondisi baik</li>";
                          } else if($k == 0) {
                            echo "<li>Posisi APAR tidak mudah dilihat dan tidak mudah dicapai</li>";
                          } else if($l == 0) {
                            echo "<li>Penempatan APAR tidak sesuai dengan jenis dan penggolongan kelas kebakaran</li>";
                          } else if($a == 0) {
                            echo "<li>APAR ditempatkan tidak menggantung pada dinding dengan konstruksi penguat atau di dalam box yang tidak terkunci</li>";
                          } else if($b == 0) {
                            echo "<li>APAR tidak dilengkapi dengan tanda yaitu 125 cm dari dasar lantai</li>";
                          } else {
                            echo "<li>Tidak Ada Kerusakan</li>";
                          }
                          ?>
                        </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- END OVERVIEW -->
          </div>
        </div>
        <!-- END TABLE HOVER -->
      <!-- END OVERVIEW -->
        </div>
      </div>
    </div>
  </div>

  <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var a = "<?php echo $baik; ?>";
  var b = "<?php echo $krng; ?>";
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
  <!-- END MAIN CONTENT -->
<?php include "footer.php"; ?>
