<!DOCTYPE html>
<html lang="en">



<style>
      body {
            background-color: #000000;
      }
</style>

<head>

      <title>Sync-SiapBmn</title>
      <link rel="icon" type="image/png" href="/siapbmn/public/photo/siapbmn.png">
</head>

<body>
      <?php
      $servername = "localhost";
      $database = "database_siapbmn";
      $username = "root";
      $password = "Th3Blu3s";

      // Create connection

      $conn = mysqli_connect($servername, $username, $password, $database);

      // Check connection

      if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
      }

      echo "<p style='color:green' >connected successfully ... <br><br>";
      echo "process sync data from [.tmp] to [.main] : <br>";

      // $sql = "INSERT INTO referensi_level (level, jabatan) VALUES ('3', 'x')";
      $sql_syncdatarekonsiliasiinternal = "replace into rekonsiliasi_internal select * from rekonsiliasi_internal_tmp;";
      $sql_syncdatarekonsp2dbmnakun53 = "replace into sp2d53 select * from sp2d53_tmp;";
      $sql_syncdatarekonglbmn = "replace into glbmn select * from glbmn_tmp;";
      $sql_syncdatatktm = "replace into tktm select * from tktm_tmp;";
      $sql_syncdatatktmpersediaan = "replace into tktm_persediaan select * from tktm_persediaan_tmp;";
      $sql_syncdatareklasifikasiaset = "replace into reklasifikasi_aset select * from reklasifikasi_aset_tmp;";
      $sql_syncdatasaldotidaknormal = "replace into saldo_tidak_normal select * from saldo_tidak_normal_tmp;";
      $sql_syncdataasetbelumdiregister = "replace into aset_belum_register select * from aset_belum_register_tmp;";
      $sql_syncdatanilaiperolehanminus = "replace into nilai_perolehan_minus select * from nilai_perolehan_minus_tmp;";
      $sql_syncdatanilaibukuminus = "replace into nilai_buku_minus select * from nilai_buku_minus_tmp;";
      $sql_syncdatatanggalbukuminus = "replace into tanggal_buku_minus select * from tanggal_buku_minus_tmp;";



      if (mysqli_query($conn, $sql_syncdatarekonsiliasiinternal)) {
            echo "- sync data rekonsiliasi internal  : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br>";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatarekonsp2dbmnakun53)) {
            echo " - sync data rekon sp2d  bmn akun 53 : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatarekonglbmn)) {
            echo " - sync data rekon glbmn : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatatktm)) {
            echo " - sync data transfer keluar / masuk : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatatktmpersediaan)) {
            echo " - sync data transfer keluar / masuk persediaan : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatareklasifikasiaset)) {
            echo " - sync data reklasifikasi aset : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatasaldotidaknormal)) {
            echo " - sync data saldo tidak normal : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdataasetbelumdiregister)) {
            echo " - sync data aset belum diregister : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatanilaiperolehanminus)) {
            echo " - sync data nilai perolehan minus : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatanilaibukuminus)) {
            echo " - sync data nilai buku minus : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      if (mysqli_query($conn, $sql_syncdatatanggalbukuminus)) {
            echo " - sync data tanggal buku minus : [ " . mysqli_affected_rows($conn) . " rows affected ]  <br> ";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }





      mysqli_close($conn);

      ?>

      <br>
      <br>
      ,_,
      <br>
      [0,0] 
      <br>
      |)__)
      <br>
      -”-”------sync data completed--------//-----
      <br>
      ------------------------------------------//------


</body>

</html>