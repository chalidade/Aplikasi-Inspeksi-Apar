<?php include "header.php"; ?>
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
							<h3 class="panel-title">Data Apar</h3>
							<p class="panel-subtitle">Periode: Oct 14, 2016 - Oct 21, 2016</p>
						</div>
            <!-- TABLE HOVER -->
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr style="background-color:#656565;color:#fff;">
                      <th>#</th>
                      <th>Kode</th>
                      <th>Lokasi</th>
                      <th>Jenis</th>
                      <th>Berat</th>
                      <th>Tanggal Expired</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "data/koneksi.php";
                    $kondisi     = $_REQUEST['kondisi'];

                    if($kondisi  == "baik") {
                      $apar = "SELECT * FROM `apar` WHERE kondisi = 1";
                    } else if ($kondisi == "rusak") {
                      $apar  = "SELECT * FROM `apar` WHERE kondisi = 0";
                    } else {
                      $apar = "SELECT * FROM `apar`";
                    }

                    $result      = mysqli_query($connect,$apar);
                    while ($row  = mysqli_fetch_row($result))
                      {
                        $no      = $row[0];
                        $kode    = $row[1];
                        $lokasi  = $row[2];
                        $jenis   = $row[3];
                        $berat   = $row[4];
                        $tgl_exp = $row[5];
                        $kondisi = $row[6];
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $kode; ?></td>
                      <td><?php echo $lokasi; ?></td>
                      <td><?php echo $jenis; ?></td>
                      <td><?php echo $berat; ?> Kg</td>
                      <td><?php echo $tgl_exp; ?></td>
                      <td>
                          <?php if($kondisi == 1) { ?>
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
              </div>
            </div>
            <!-- END TABLE HOVER -->
					<!-- END OVERVIEW -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		<?php include "footer.php"; ?>
