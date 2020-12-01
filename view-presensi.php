<?php
  include 'templates/header.php';
  $kode_mapel = $_GET['id'];
  $kode_siswaview = $rowUser['nis'];
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1">
        <div class="col mb-4">
          <div class="card-deck">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bab 1 Aljabar</h5>
                  <p class="card-text">Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>
                  <?php echo $kode_siswaview ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card-deck">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Presensi</h5>
                  <div class="card bg-transparent border-0" style="width: 25rem;">
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
                          <td>2 Januari 2021</td>
                          <td>Selesai</td>
                          <td><a href="action-presensi.php?idm=<?php echo $kode_mapel; ?>&nis=<?php echo $kode_siswaview ?>" class="text-color-a">Presensi</a></td>
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
