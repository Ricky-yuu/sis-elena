<?php
  include 'templates/header.php';
  $kode_mapel = $_GET['id'];
  $kode_siswaview = $rowUser['nis'];
  $materi_mapel_query = mysqli_query($link, "SELECT kode_mapel, judul, kode_aktivitas, kode_aktivitas2 FROM materi_mapel WHERE kode_aktivitas='$kode_mapel'");
  $tampil_materi_query = mysqli_fetch_array($materi_mapel_query);

  $tampil_presensi2 = mysqli_query($link, "SELECT * FROM presensi2 where kode_aktivitas = '$kode_mapel'");
  $tampilkan_presensi2 = mysqli_fetch_array($tampil_presensi2);

  $tampil_presensi = mysqli_query($link, "SELECT * FROM presensi where kode_aktivitas = '$kode_mapel' AND nis='$kode_siswaview'");
  $tampilkan_presensi = mysqli_fetch_array($tampil_presensi);
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <div class="col mb-4">
          <div class="card-deck">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $tampil_materi_query['judul']; ?></h5>
                  <p class="card-text"><?php echo $tampilkan_presensi2['deskripsi']; ?></p>
                </div>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card-deck">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Presensi</h5>
                  <div class="card bg-transparent border-0" style="width: 18rem;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo date('D, d M y', strtotime($tampilkan_presensi2['tanggal_akhir'])) . " " . date('H:i', strtotime($tampilkan_presensi2['jam_mulai'])) . " - " . date('H:i', strtotime($tampilkan_presensi2['jam_akhir'])); ?></td>
                          <td><?php echo $tampilkan_presensi['status']; ?></td>
                          <td>
                            <?php if (date('H:i', strtotime($tampilkan_presensi2['jam_akhir'])) <= date('H:i') && date('D, d M y', strtotime($tampilkan_presensi2['tanggal_akhir'])) >= date('D, d M y')){
                              echo "<p>Presensi2<p>";
                            }elseif ($tampilkan_presensi['catatan'] == 1) {
                              echo "<p>Presensi<p>";
                            }else{?>
                              <a href="action-presensi.php?idm=<?php echo $kode_mapel; ?>" class="text-color-a">Presensi</a></td>
                            <?php
                            }?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end-->

<?php include 'templates/footer.php' ?>
