<?php
  include 'templates/header-guru.php';
  $no = 1;
  $mapelGuru = $rowUser['kode_mapel'];
  $tampilMapel = mysqli_query($link, "SELECT nama_mapel FROM mapel where kode_mapel = '$mapelGuru'");
  $kodeKelasGuru = mysqli_fetch_array($tampilMapel);
  $kelasGuru = $kodeKelasGuru['nama_mapel'];
  $listKelas = mysqli_query($link, "SELECT mapel.kode_kelas, mapel.nama_mapel, kelas.nama FROM mapel INNER JOIN kelas ON mapel.kode_kelas=kelas.kd_kelas WHERE mapel.nama_mapel = '$kelasGuru'");
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-4 text-center">
        <?php
          while ($dataMapel = mysqli_fetch_array($listKelas)) :
        ?>
        <div class="col mb-4">
          <div class="card">
            <a href="#" class="text-color-a">
              <img src="./asset/img/matematika-logo.jpg" class="card-img-top mx-auto d-block" alt="..." style="width:70%">
              <div class="card-body">
                <h5 class="card-title"><?php echo $dataMapel['nama'] ?></h5>
              </div>
            </a>
          </div>
        </div>
        <?php
          endwhile;
        ?>
      </div>
    </div>
    <!-- main end-->

<?php include 'templates/footer.php' ?>
