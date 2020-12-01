<?php
  include 'templates/header-guru.php';
  $id = $_GET['id'];
  $kodeGuru = $rowUser['nip'];
  $kodeMapelGuruQuery = mysqli_query($link, "SELECT * FROM tb_mengajar where kode_guru='$kodeGuru' and kode_kelas='$id'");
  $kodeMapelGuru = mysqli_fetch_array($kodeMapelGuruQuery);
  $kodeMapelGuru2 = $kodeMapelGuru['kode_mapel'];
  $tampilMateriQuery = mysqli_query($link, "SELECT * FROM materi_mapel where kode_kelas='$id' and kode_mapel='$kodeMapelGuru2'");
  //$tampilMateri = mysqli_fetch_array($tampilMateriQuery);
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
                <p class="card-text">Presensi, 2 Januari 2020</p>
                <p class="card-text">Materi Pengantar Aljabar</p>
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
