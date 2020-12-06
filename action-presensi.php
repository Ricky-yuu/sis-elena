<?php
  include 'templates/header.php';
  $kode_mapel = $_GET['idm'];
  $kode_siswa = $_GET['nis'];
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <div class="col mb-4">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pilih salah satu untuk mengisi presensi kehadiran</h5>
                <p><?php echo $kode_mapel . $kode_siswa; ?></p>
                <form action="" method="post">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Hadir</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Absen</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3">Telat</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline4">Izin</label>
                  </div>
                  <div class="col-sm-10 mt-3">
                    <button class="btn btn-success " name="submit" type="submit">Simpan</button>
                    <button class="btn btn-success" name="submit" type="submit">Batal</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end-->

<?php include 'templates/footer.php' ?>
