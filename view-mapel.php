<?php
  include 'templates/header.php';
  $id = $_GET['id'];
  $nis = $rowUser['nis'];
  $tampilMateriQuery = mysqli_query($link, "SELECT materi_mapel.kode_mapel, materi_mapel.judul, materi_mapel.kode_aktivitas, materi_mapel.kode_aktivitas2, materi_mapel.kode_aktivitas3, presensi2.nama_presensi, tugas2.nama_tugas FROM materi_mapel LEFT JOIN presensi2 ON materi_mapel.kode_aktivitas=presensi2.kode_aktivitas LEFT JOIN tugas2 ON materi_mapel.kode_aktivitas2=tugas2.kode_aktivitas2 where materi_mapel.kode_mapel='$id'" );
?>
    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <?php
          while ($tampilMateri = mysqli_fetch_array($tampilMateriQuery)) :
        ?>
        <div class="col mb-4">
          <div class="card">
              <div class="card-body">
                <a href="#" class="text-color-a"><h5 class="card-title"><?php echo $tampilMateri['judul']; ?></h5></a>
                <a href="view-presensi.php?id=<?php echo $tampilMateri['kode_aktivitas']; ?>" class="card-text text-color-a"><p><?php echo $tampilMateri['nama_presensi']; ?></p></a>
                <a href="view-assign.php?id=<?php echo $tampilMateri['kode_aktivitas2']; ?>" class="card-text text-color-a"><p><?php echo $tampilMateri['nama_tugas']; ?></p></a>
              </div>
          </div>
        </div>
      <?php endwhile; ?>
      </div>
    </div>
    <!-- main end-->

<?php
  include 'templates/footer.php'
?>
