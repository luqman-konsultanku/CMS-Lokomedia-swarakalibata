<?php
if(!isset($_SESSION)) { 
  session_start(); 
}
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

  include "../../../config/koneksi.php";
  include "../../../config/fungsi_thumb.php";

  $module=$_GET['module'];
  $act=isset($_GET['act']) ? $_GET['act']:'';

  // Update Background
  if ($module=='background' AND $act=='update'){
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file   = $_FILES['fupload']['name'];
    if(!empty($nama_file)){

      UploadBackground($nama_file);
      
      mysqli_query($conn,"UPDATE background SET gambar = '$nama_file' WHERE id_background = '$_POST[id]'");
      
    }
    header('location:../../media.php?module='.$module);
  }
}
?>
