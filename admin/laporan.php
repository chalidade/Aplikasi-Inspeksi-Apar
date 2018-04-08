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
							<h3 class="panel-title">Data Laporan Inspeksi</h3>
							<p class="panel-subtitle">Periode: Oct 14, 2016 - Oct 21, 2016</p>
						</div>
            <!-- TABLE HOVER -->
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr style="background-color:#656565;color:#fff;">
                      <th>#</th>
                      <th>Kode Apar</th>
                      <th>ID Inspektor</th>
                      <th>Tanggal Inspeksi</th>
                      <th> Status </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "data/koneksi.php";
                    $kondisi     = $_REQUEST['kondisi'];

                    if($kondisi  == "sudah") {
                      $apar = "SELECT * FROM `inspeksi_apar` WHERE status_inspeksi = 1";
                    } else if ($kondisi == "belum") {
                      $apar  = "SELECT * FROM `inspeksi_apar` WHERE status_inspeksi = 0";
                    } else {
                      $apar = "SELECT * FROM `inspeksi_apar`";
                    }

                    $result      = mysqli_query($connect,$apar);
                    while ($row  = mysqli_fetch_row($result))
                      {
                        $no           = $row[0];
                        $kode         = $row[1];
                        $inspektor    = $row[2];
                        $tgl_inspeksi = $row[3];
                        $status       = $row[4];
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <?php if($status == 1) { ?>
                      <td><a href="rincian.php?kode=<?php echo $kode; ?>"><?php echo $kode; ?></a></td>
                      <?php } else { ?>
                      <td><a href="checklist.php?id=<?php echo $kode; ?>"><?php echo $kode; ?></a></td>
                      <?php } ?>
                      <td><?php echo $inspektor; ?></td>
                      <td><?php echo $tgl_inspeksi; ?></td>
                      <td>
                          <?php if($status == 1) { ?>
                            <div class="done">sudah</div>
                          <?php } else { ?>
                            <div class="not">belum</div>
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
