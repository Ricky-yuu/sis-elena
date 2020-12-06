<?php

  include 'templates/header.php';

if ( isset($_POST{'submit'}) ){

  $nama = $_FILES{'gambar'}{'name'};
  $error = $_FILES{'gambar'}{'error'};
  $size = $_FILES{'gambar'}{'size'};
  $asal = $_FILES{'gambar'}{'tmp_name'};
  $format = $_FILES{'gambar'}{'type'};

  if ( $error == 0) {
    if($size < 10000000){
      if($format == 'image/jpeg'){
        move_uploaded_file($asal, 'ipload/' . $nama);
      }
    }else{
      echo '<script type="text/javascript">
        alert("File terlalu besar/format salah");
      </script>';
    }
  }else{
    echo '<script type="text/javascript">
      alert("error!");
    </script>';
  }

}
?>


        <table width=30% border=1>
          <tr bgcolor=#F5F5DC>
            <td cospan=2>
              <div class="col table-center">
              <form action="course.php" method="post" ectype="multipart/form-data">
                <a property="navbar-brand text-black"><h1>Status Tugas</h1></a>
                <tbody>
                  <tr>
                    <td property="text" align="left">Status Pengumpulan
                  </tr>
                  <tr>
                    <td property="text" align="left">Deadline
                  </tr>
                  <tr>
                    <td property="text" align="left">Sisa Waktu
                  </tr>
                  <tr>
                    <td property="text" align="left">File Tugas<input type="file" name="gambar">
                    <input type="submit" name="submit" value="upload">
                  </tr>
                </tbody>
              </div>
            </td>
          </tr>
        </form>
        </table>
        <?php


include 'templates/footer.php' ?>
