<?php
  include 'templates/header-guru.php';
  $kode_aktivitas = $_GET['id'];
  $idm = $_GET['idm'];
  $kodeGuru = $rowUser['nip'];
  $kodeMapelGuruQuery = mysqli_query($link, "SELECT * FROM tb_mengajar where kode_guru='$kodeGuru' and kode_kelas='$idm'");
  $kodeMapelGuru = mysqli_fetch_array($kodeMapelGuruQuery);
  $kodeMapelGuru2 = $kodeMapelGuru['kode_mapel'];
  $tampil_presensi_query = mysqli_query($link, "SELECT presensi.nama_aktivitas, presensi.jam, presensi.tanggal, presensi.status, presensi.catatan, mapel.nama_mapel, siswa.nama FROM presensi LEFT JOIN mapel ON presensi.kode_mapel = mapel.kode_mapel LEFT JOIN siswa ON presensi.nis=siswa.nis WHERE presensi.kode_mapel='$kodeMapelGuru2' AND presensi.kode_aktivitas='$kode_aktivitas'");
?>
<!-- main start-->
<div class="container">
  <div class="row row-cols-1 row-cols-md-1">
    <div class="col mb-4">
      <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jam</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Catatan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  while ($tampil_presensi = mysqli_fetch_array($tampil_presensi_query)):
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tampil_presensi['nama']; ?></td>
                  <td><?php echo $tampil_presensi['jam']; ?></td>
                  <td><?php echo $tampil_presensi['tanggal']; ?></td>
                  <td><?php echo $tampil_presensi['status']; ?></td>
                  <td><?php echo $tampil_presensi['catatan']; ?></td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
<!-- main end-->

<?php
include 'templates/footer.php'
?>
