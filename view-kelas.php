<?php
  include 'templates/header-guru.php';
  $id = $_GET['id'];
  $kodeGuru = $rowUser['nip'];
  $kodeMapelGuruQuery = mysqli_query($link, "SELECT * FROM tb_mengajar where kode_guru='$kodeGuru' and kode_kelas='$id'");
  $kodeMapelGuru = mysqli_fetch_array($kodeMapelGuruQuery);
  $kodeMapelGuru2 = $kodeMapelGuru['kode_mapel'];
  $tampilMateriQuery = mysqli_query($link, "SELECT materi_mapel.judul, materi_mapel.kode_aktivitas, materi_mapel.kode_aktivitas2, materi_mapel.kode_aktivitas3, presensi2.nama_presensi, tugas2.nama_tugas FROM materi_mapel LEFT JOIN presensi2 ON materi_mapel.kode_aktivitas=presensi2.kode_aktivitas LEFT JOIN tugas2 ON materi_mapel.kode_aktivitas2=tugas2.kode_aktivitas2 where materi_mapel.kode_mapel='$kodeMapelGuru2' AND materi_mapel.kode_kelas='$id'");
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <?php
        //echo $kodeMapelGuru2;
          while ($tampilMateri = mysqli_fetch_array($tampilMateriQuery)) :
        ?>
        <div class="col mb-4">
          <div class="card">
              <div class="card-body">
                <a href="#" class="text-color-a"><h5 class="card-title"><?php echo $tampilMateri['judul']; ?></h5></a>
                <a href="view-presensi-guru.php?id=<?php echo $tampilMateri['kode_aktivitas'];?>&idm=<?php echo $id; ?>" class="card-text text-color-a"><p><?php echo $tampilMateri['nama_presensi']; ?></p></a>
                <a href="" class="card-text text-color-a"><p><?php echo $tampilMateri['nama_tugas']; ?></p></a>
              </div>
          </div>
        </div>
        <?php endwhile; ?>
        <div class="col mb-4">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Aktivitas Baru</h5>
                <a href="tambah-aktivitas.php" class="btn btn-primary">Tambah</a>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end-->

<?php
  include 'templates/footer.php'
?>
