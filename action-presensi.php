<?php
  include 'templates/header.php';
  $kode_aktivitas = $_GET['idm'];
  $kode_siswa = $rowUser['nis'];

  $tampil_presensi2 = mysqli_query($link, "SELECT jam_akhir FROM presensi2 where kode_aktivitas = '$kode_aktivitas'");
  $tampilkan_presensi2 = mysqli_fetch_array($tampil_presensi2);

  $tampil_presensi = mysqli_query($link, "SELECT catatan FROM presensi where kode_aktivitas = '$kode_aktivitas' AND nis='$kode_siswa'");
  $tampilkan_presensi = mysqli_fetch_array($tampil_presensi);
  if (date('H:i', strtotime($tampilkan_presensi2['jam_akhir'])) <= date('H:i')){
    echo "<script>
            document.location='view-presensi.php?id=" . $kode_aktivitas ."';
          </script>";
  }elseif ($tampilkan_presensi['catatan'] == 1) {
    echo "<script>
            document.location='view-presensi.php?id=" . $kode_aktivitas ."';
          </script>";
  }
  if (isset($_POST['simpan'])) {
    $status = $_POST['customRadioInline1'];
    $kode_aktivitas2 = $_POST['aktivitas'];
    $kode_siswa2 = $_POST['kode_aktivitas_siswa'];
    $kdabsen = "mtk1";
    $querynya = mysqli_query($link, "UPDATE presensi SET status='$status', catatan='1' WHERE kode_aktivitas='$kode_aktivitas2' AND nis='$kode_siswa2'");
    if($querynya){
      echo "<script>
              document.location='view-presensi.php?id=" . $kode_aktivitas2 ."';
            </script>";
      }
  }

?>
    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <div class="col mb-4">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pilih salah satu untuk mengisi presensi kehadiran</h5>
                <form action="action-presensi.php" method="POST">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="hadir" checked>
                    <label class="custom-control-label" for="customRadioInline1">Hadir</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="absen">
                    <label class="custom-control-label" for="customRadioInline2">Absen</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input" value="telat">
                    <label class="custom-control-label" for="customRadioInline3">Telat</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input" value="izin">
                    <label class="custom-control-label" for="customRadioInline4">Izin</label>
                  </div>
                  <div class="col-sm-10 mt-3">
                    <button class="btn btn-success " name="simpan" type="submit">Simpan</button>
                    <a href="javascript:window.history.go(-1);" class="btn btn-success" type="submit">Batal</a>
                  </div>
                  <input type="text" class="inputan" name="aktivitas" value="<?php echo $kode_aktivitas; ?>" style="display:none;">
                  <input type="text" class="inputan" name="kode_aktivitas_siswa" value="<?php echo $kode_siswa; ?>" style="display:none;">
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end-->

<?php include 'templates/footer.php' ?>
