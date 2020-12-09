<?php
  include 'templates/header-guru.php';
  $kode_guru = $rowUser['nip'];
  if (isset($_POST['btnsimpan'])) {
    $query_kode_mapel = mysqli_query($link, "SELECT tb_mengajar.kode_guru, tb_mengajar.kode_mapel, tb_mengajar.kode_kelas FROM tb_mengajar LEFT JOIN kelas ON tb_mengajar.kode_kelas = kelas.kd_kelas WHERE tb_mengajar.kode_guru='$kode_guru' AND tb_mengajar.kode_kelas='$_POST[kelas]'");
    $hasil_query_kode_mapel = mysqli_fetch_array($query_kode_mapel);

    $judul = $_POST['judul'];
    $nama_presensi = $_POST['nama_presensi'];
    $kode_mapel = $hasil_query_kode_mapel['kode_mapel'];
    $tanggal_mulai_presensi = date("Y-m-d", strtotime($_POST['tanggal_mulai_presensi']));
    $jam_mulai_presensi =  date("H:i", strtotime($_POST['jam_mulai_presensi']));
    $tanggal_akhir_prsensi = date("Y-m-d", strtotime($_POST['tanggal_akhir']));
    $jam_akhir_prsensi = date("H:i", strtotime($_POST['jam_akhir']));
    $deskripsi = $_POST['deskripsi'];

    $query_simpan_presensi = mysqli_query($link, "INSERT INTO presensi2(nama_presensi, kode_mapel, tanggal_mulai, jam_mulai, tanggal_akhir, jam_akhir, deskripsi) VALUES ('$nama_presensi', '$kode_mapel', '$tanggal_mulai_presensi', '$jam_mulai_presensi', '$tanggal_akhir_prsensi', '$jam_akhir_prsensi', '$deskripsi')");

    if ($query_simpan_presensi) {
      $query_tampil_presensi = mysqli_query($link, "SELECT kode_aktivitas FROM presensi2 WHERE nama_presensi='$nama_presensi'AND kode_mapel='$kode_mapel'AND tanggal_mulai='$tanggal_mulai_presensi' AND jam_mulai='$jam_mulai_presensi' AND tanggal_akhir='$tanggal_akhir_prsensi' AND jam_akhir='$jam_akhir_prsensi' AND deskripsi='$deskripsi' ");
      $hasil_query_tampil_presensi = mysqli_fetch_array($query_tampil_presensi);
      $kode_aktivitas1 = $hasil_query_tampil_presensi['kode_aktivitas'];

      $query_insert_materi_mapel = mysqli_query($link, "INSERT INTO materi_mapel(kode_mapel, judul, kode_aktivitas, kode_aktivitas2, kode_aktivitas3, kode_kelas) VALUES ('$kode_mapel', '$judul', '$kode_aktivitas1', NULL, NULL, '$_POST[kelas]') ");

      $query_ambil_siswa = mysqli_query($link, "SELECT nis FROM siswa WHERE kode_kelas='$_POST[kelas]'");

      while ($nis = mysqli_fetch_array($query_ambil_siswa)) {
        $query_insert_siswa = mysqli_query($link, "INSERT INTO presensi (kode_aktivitas, kode_mapel, nis) VALUES ('$kode_aktivitas1', '$kode_mapel', '$nis[nis]' )");
      }

      echo "<script>
              alert('Data BERHASIL disimpan " .$kode_aktivitas1.  "');
              document.location='tambah-aktivitas.php';
            </script>";
    }else {
      echo "<script>
              alert('Data GAGAL disimpan');
              document.location='tambah-aktivitas.php';
            </script>";
    }
  }

?>
    <!-- main start-->
    <div class="container">
      <form method="POST" action="tambah-aktivitas.php">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control" placeholder="Input Judul Tugas" required>
        </div>
        <div class="form-group">
          <input type="checkbox" class="btn-presensi">Presensi</input>
          <div class="form-presensi form-group" style="display:none;">
            <label>Presensi</label>
            <input type="text" name="nama_presensi" class="form-control" placeholder="Input Judul Presensi">
          </div>
          <div class="form-presensi form-group" style="display:none;">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai_presensi" class="form-control" placeholder="Tanggal">
          </div>
          <div class="form-presensi form-group" style="display:none;">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai_presensi" class="form-control" placeholder="Jam">
          </div>
        </div>
        <div class="form-group">
          <input type="checkbox" class="btn-tugas">Tugas</input>
          <div class="form-tugas form-group" style="display:none;">
            <label>Tugas</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Input Judul">
          </div>
        </div>
        <div class="form-group">
          <input type="checkbox" class="btn-upload">Upload</input>
          <div class="form-upload form-group" style="display:none;">
            <label>Upload</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Input Judul">
          </div>
        </div>
        <div class="form-group">
          <label>Tanggal Berakhir</label>
          <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal" required>
        </div>
        <div class="form-group">
          <label>Jam Berakhir</label>
          <input type="time" name="jam_akhir" class="form-control" placeholder="Jam" required>
        </div>
        <div class="form-group">
          <label>Kelas</label>
          <select class="form-control" name="kelas">
            <option disabled selected>Pilih Kelas</option>
            <?php
            $tampilFilter = mysqli_query($link, "SELECT tb_mengajar.kode_guru, tb_mengajar.kode_mapel, tb_mengajar.kode_kelas, kelas.nama FROM tb_mengajar LEFT JOIN kelas ON tb_mengajar.kode_kelas = kelas.kd_kelas WHERE tb_mengajar.kode_guru='$kode_guru'");
            while ($dataFilter = mysqli_fetch_array($tampilFilter)) {
              echo "<option value=\"{$dataFilter['kode_kelas']}\">";
              echo $dataFilter['nama'];
              echo "</option>";
            }
          ?>
          </select>
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>
          <button type="submit" class="btn btn-success" name="btnsimpan">Simpan</button>
          <button type="reset" class="btn btn-danger" name="btnreset">Kosongkan</button>
      </form>
    </div>
    <!-- main end-->
    <script type="text/javascript">
    $(document).ready(function(){
      $(".btn-presensi").click(function(){
        if($(this).prop("checked") == true) {
          $(".form-presensi").show();
        }else if($(this).prop("checked") == false) {
          $(".form-presensi").hide();
        }
      });
      $(".btn-tugas").click(function(){
        if($(this).prop("checked") == true) {
          $(".form-tugas").show();
        }else if($(this).prop("checked") == false) {
          $(".form-tugas").hide();
        }
      });
      $(".btn-upload").click(function(){
        if($(this).prop("checked") == true) {
          $(".form-upload").show();
        }else if($(this).prop("checked") == false) {
          $(".form-upload").hide();
        }
      });
    });
    </script>
<?php
  include 'templates/footer.php'
?>
