<?php
  include 'templates/header-guru.php';
?>
    <!-- main start-->
    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="kode_barang" class="form-control" placeholder="Input Judul" required>
        </div>
        <div class="form-group">
          <label>Aktivitas</label>
          <select class="form-control" name="kategori">
            <option disabled selected>Pilih Aktivitas</option>
            <option>Presensi</option>
            <option>Upload Materi</option>
            <option>Tugas</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text" name="date" class="form-control datepicker">
        </div>
        <div class="form-group">
          <label>Jam Berakhir</label>
          <input type="text" name="ciri_ciri" class="form-control timepicker" placeholder="Jam" required>
        </div>
        <div class="form-group">
          <label>Kelas</label>
          <select class="form-control" name="kelaas">
            <option disabled selected>Pilih Kelas</option>
            <option>Kelas X A1</option>
            <option>Kelas X A2</option>
            <option>Kelas X A3</option>
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

<?php
  include 'templates/footer.php'
?>
