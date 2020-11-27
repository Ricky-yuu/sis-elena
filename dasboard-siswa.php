<?php
  include 'templates/header.php';

  $kelasUser = $rowUser['kode_kelas'];
  $tampilMapel = mysqli_query($link, "SELECT nama_mapel, kode_mapel FROM mapel where kode_kelas = '$kelasUser'");
?>

    <!-- main start-->
    <div class="container">
      <div class="row row-cols-1 row-cols-md-4 text-center">
        <?php
          while ($dataMapel = mysqli_fetch_array($tampilMapel)) :
        ?>
        <div class="col mb-4">
          <div class="card">
            <a href="view-mapel.php?id=<?php echo $dataMapel['kode_mapel'];?>" class="text-color-a">
              <img src="./asset/img/matematika-logo.jpg" class="card-img-top mx-auto d-block" alt="..." style="width:70%">
              <div class="card-body">
                <h5 class="card-title"><?php echo $dataMapel['nama_mapel'] ?></h5>
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
