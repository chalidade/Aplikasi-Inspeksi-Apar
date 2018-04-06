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
          <h3 class="panel-title">Update Terakhir</h3>
          <p class="panel-subtitle">Periode: Oct 14, 2016 - Oct 21, 2016</p>
        </div>
        <!-- TABLE HOVER -->
          <div class="panel-body">

              <table class="table table-hover">
                <thead>
                  <tr style="background-color:#656565;color:#fff;">
                    <th>#</th>
                    <th>ID Inspektor</th>
                    <th>Kode APAR</th>
                    <th>Status APAR</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "data/koneksi.php";
                  $kondisi     = $_REQUEST['kondisi'];
                  $apar        = "SELECT * FROM `pelaporan`";
                  $result      = mysqli_query($connect,$apar);
                  while ($row  = mysqli_fetch_row($result))
                    {
                      $no      = $row[0];
                      $idinspe = $row[1];
                      $kode    = $row[2];
                      $status  = $row[3];
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $idinspe; ?></td>
                    <td><?php echo $kode; ?></td>
                    <td>
                        <?php if($status == 1) { ?>
                          <div class="done" style="width:70%; text-align:center;">Siap Digunakan</div>
                        <?php } else { ?>
                          <div class="not"  style="width:70%; text-align:center;">Butuh Perbaikan</div>
                        <?php } ?>
                    </td>
                    <td><a href="rincian.php?kode=<?php echo $kode; ?>">Rincian</a></td>
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
