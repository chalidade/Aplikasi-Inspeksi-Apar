<!-- LEFT SIDEBAR -->
<?php
$id = $_REQUEST['id'];
?>
<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <?php if($id == 'home'){ ?>
        <li><a href="index.php?id=home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <?php } else { ?>
        <li><a href="index.php?id=home" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <?php } ?>

        <?php if($id == 'dataApar'){ ?>
        <li><a href="data-apar.php?id=dataApar" class="active"><i class="lnr lnr-list"></i> <span>Data Apar</span></a></li>
        <?php } else { ?>
        <li><a href="data-apar.php?id=dataApar" class=""><i class="lnr lnr-list"></i> <span>Data Apar</span></a></li>
        <?php } ?>

        <?php if($id == 'laporan'){ ?>
        <li><a href="laporan.php?id=laporan" class="active"><i class="lnr lnr-printer"></i> <span>Laporan</span></a></li>
        <?php } else { ?>
        <li><a href="laporan.php?id=laporan" class=""><i class="lnr lnr-printer"></i> <span>Laporan</span></a></li>
        <?php } ?>

        <?php if($id == 'lokasi'){ ?>
        <li><a href="lokasi.php?id=lokasi" class="active"><i class="lnr lnr-map-marker"></i> <span>Denah Lokasi</span></a></li>
        <?php } else { ?>
        <li><a href="lokasi.php?id=lokasi" class=""><i class="lnr lnr-map-marker"></i> <span>Denah Lokasi</span></a></li>
        <?php } ?>

        <li><a href="images/permen.pdf" class=""><i class="lnr lnr-file-empty"></i> <span>Peraturan</span></a></li>
        <li><a href="../logout.php" class=""><i class="lnr lnr-arrow-left-circle"></i> <span>Logout</span></a></li>
      </ul>
    </nav>
  </div>
</div>
<!-- END LEFT SIDEBAR -->
