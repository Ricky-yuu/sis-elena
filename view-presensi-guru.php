<?php
  include 'templates/header-guru.php';
  $kode_aktivitas = $_GET['id'];
  $idm = $_GET['idm'];
  $kodeGuru = $rowUser['nip'];

  $date_now = date("Y-m-d");
  $time_now = date("H:i:s");

  if (isset($_POST['simpan'])) {
    $status = $_POST['customstatus'];
    //$kode_aktivitas2 = $_POST['aktivitas'];
    $kode_siswa2 = $_POST['kode_aktivitas_siswa'];
    $querynya = mysqli_query($link, "UPDATE presensi SET status='$status', catatan='1', tanggal='$date_now', jam='$time_now' WHERE kode_aktivitas='$kode_aktivitas' AND nis='$kode_siswa2'");
    if($querynya){
      echo "<script>
              document.location='view-presensi-guru.php?id=" . $kode_aktivitas ."&idm=" . $idm ."';
            </script>";
      }
  }

  $kodeMapelGuruQuery = mysqli_query($link, "SELECT * FROM tb_mengajar where kode_guru='$kodeGuru' and kode_kelas='$idm'");
  $kodeMapelGuru = mysqli_fetch_array($kodeMapelGuruQuery);
  $kodeMapelGuru2 = $kodeMapelGuru['kode_mapel'];
  $tampil_presensi_query = mysqli_query($link, "SELECT presensi.jam, presensi.tanggal, presensi.status, presensi.catatan, mapel.nama_mapel, siswa.nis, siswa.nama FROM presensi LEFT JOIN mapel ON presensi.kode_mapel = mapel.kode_mapel LEFT JOIN siswa ON presensi.nis=siswa.nis WHERE presensi.kode_mapel='$kodeMapelGuru2' AND presensi.kode_aktivitas='$kode_aktivitas' ORDER BY siswa.nis  ASC ");
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
                  <th scope="col">Aksi</th>
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
                  <td><?php echo date('d M y', strtotime($tampil_presensi['tanggal'])); ?></td>
                  <td><?php echo $tampil_presensi['status']; ?></td>
                  <td><?php if ($tampil_presensi['catatan'] == "1") {
                    echo "<i class='fa fa-check-square'></i>";
                  }else {
                    echo "?";
                  } ?></td>
                  <td><a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php
                  $nis = $tampil_presensi['nis'];
                  echo $nis; ?>">Ubah</button></td>
                </tr>
                <!-- The Modal -->
                <div class="modal fade" id="myModal<?php echo $tampil_presensi['nis']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Rubah Status Presensi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="" method="post">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="customstatus" class="form-control" placeholder="Input Status" required>
                          </div>
                          <input type="hidden" class="inputan" name="kode_aktivitas_siswa" value="<?php echo $tampil_presensi['nis']; ?>">
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- main end-->

<?php
include 'templates/footer.php'
?>
