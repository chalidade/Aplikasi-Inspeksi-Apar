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
							<h3 class="panel-title">Inspeksi</h3>
							<p class="panel-subtitle">APAR (212B12) - 21 September 2018</p>
						</div>
            <!-- TABLE HOVER -->
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr style="background-color:#656565;color:#fff;">
                      <th>#</th>
                      <th>Kode Apar</th>
                      <th>Lokasi Apar</th>
                      <th>Jenis Apar</th>
                      <th>Inspektor</th>
                      <th>Tanggal Inspeksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form method="post" action="prosesInspeksi.php">
                    <?php
                    include "data/koneksi.php";
                    session_start();
                    $id = $_REQUEST['id'];
                    $apar = "SELECT * FROM `apar` where kode = '$id'";
                    $result      = mysqli_query($connect,$apar);
                    while ($row  = mysqli_fetch_row($result))
                      {
                        $no        = $row[0];
                        $kode      = $row[1];
                        $lokasi    = $row[2];
                        $jenis     = $row[3];
                        $berat     = $row[4];
                    ?>
                    <tr>
                      <td>1</td>
                      <td><?php echo $kode; ?>
                        <input type="hidden" name="kode" value="<?php echo $kode; ?>">
                        <input type="hidden" name="id_inspektor" value="<?php echo $_SESSION['id']; ?>">
                      </td>
                      <td><?php echo $lokasi; ?></td>
                      <td><?php echo $jenis; ?></td>
                      <td><?php echo $_SESSION['nama']; ?>
                        <input type="hidden" name="nama" value="<?php echo $_SESSION['nama']; ?>">
                      </td>
                      <td><?php echo date("d/m/Y") ?>
                        <input type="hidden" name="tanggal" value="<?php echo date("d/m/Y") ?>">
                      </td>
                    <?php
                      }
                     ?>
                  </tbody>
                </table><br>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th width="80%">Checklist</th>
                      <th width="7%">Yes</th>
                      <th width="7%">No</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form method="post" id="myForm" action="inputChecklist.php">
                    <tr>
                      <td>1</td>
                      <td>Tabung APAR berwarna merah</td>
                      <td><input type="radio" name="1" value="1"></td>
                      <td><input type="radio" name="1" value="0"></td>
                    </tr>

                    <tr>
                      <td>2</td>
                      <td>Tabung APAR dalam kondisi baik (Tidak Berkarat)</td>
                      <td><input type="radio" name="2" value="1"></td>
                      <td><input type="radio" name="2" value="0"></td>
                    </tr>

                    <tr>
                      <td>3</td>
                      <td>Suhu ruangan tidak melebihi atau kurang dari 49 derajat celcius</td>
                      <td><input type="radio" name="3" value="1"></td>
                      <td><input type="radio" name="3" value="0"></td>
                    </tr>

                    <tr>
                      <td>4</td>
                      <td>Isi tabung sesuai dengan berat yang telah ditentukan</td>
                      <td><input type="radio" name="4" value="1"></td>
                      <td><input type="radio" name="4" value="0"></td>
                    </tr>

                    <tr>
                      <td>5</td>
                      <td>Cartridge dalam kondisi boiler</td>
                      <td><input type="radio" name="5" value="1"></td>
                      <td><input type="radio" name="5" value="0"></td>
                    </tr>

                    <tr>
                      <td>6</td>
                      <td>Mulut pancar tidak tersumbat</td>
                      <td><input type="radio" name="6" value="1"></td>
                      <td><input type="radio" name="6" value="0"></td>
                    </tr>

                    <tr>
                      <td>7</td>
                      <td>Pipa pancar dalam kondisi baik</td>
                      <td><input type="radio" name="7" value="1"></td>
                      <td><input type="radio" name="7" value="0"></td>
                    </tr>

                    <tr>
                      <td>8</td>
                      <td>handel dan label dalam kondisi baik</td>
                      <td><input type="radio" name="8" value="1"></td>
                      <td><input type="radio" name="8" value="0"></td>
                    </tr>

                    <tr>
                      <td>9</td>
                      <td>Posisi APAR mudah dilihat dan mudah dicapai</td>
                      <td><input type="radio" name="9" value="1"></td>
                      <td><input type="radio" name="9" value="0"></td>
                    </tr>

                    <tr>
                      <td>10</td>
                      <td>penempatan APAR sesuai dengan jenis dan penggolongan kelas kebakaran</td>
                      <td><input type="radio" name="10" value="1"></td>
                      <td><input type="radio" name="10" value="0"></td>
                    </tr>

                    <tr>
                      <td>11</td>
                      <td>APAR ditempatkan menggantung pada dinding dengan konstruksi penguat atau di dalam box yang tidak terkunci</td>
                      <td><input type="radio" name="11" value="1"></td>
                      <td><input type="radio" name="11" value="0"></td>
                    </tr>

                    <tr>
                      <td>12</td>
                      <td>APAR dilengkapi dengan tanda yaitu 125 cm dari dasar lantai</td>
                      <td><input type="radio" name="12" value="1"></td>
                      <td><input type="radio" name="12" value="0"></td>
                    </tr>

                    <tr>
                      <td></td>
                      <td></td>
                      <td><input type="submit" value="Save"></td>
                      <td><input type="button" onclick="myFunction()" value="Reset"></td>
                    </tr>
                  </form>
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
      <script>
      function myFunction() {
      document.getElementById("myForm").reset();
      }
    </script>
			<!-- END MAIN CONTENT -->
		<?php include "footer.php"; ?>
