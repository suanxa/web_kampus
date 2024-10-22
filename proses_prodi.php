<?php

if($_GET['proses']=='insert'){

    include 'konek.php';
    $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi,kode,jenjang_prodi)
    VALUES ('$_POST[namaprodi]','$_POST[kodeprodi]','$_POST[jenjangstudi]')");
  
    if ($sql) {
      echo "<script> alert('Data berhasil disimpan')</script>";
      echo "<script>window.location.href='index.php?p=prodi'</script>";
    }
  }

if($_GET['proses']=='update'){

    if (isset($_POST['submit'])) {

    include 'konek.php';
    $sql = mysqli_query($db, "UPDATE prodi SET nama_prodi= '$_POST[namaprodi]',jenjang_prodi = '$_POST[jenjangstudi]' WHERE kode='$_POST[kodeprodi]'");

    if ($sql) {
        echo "<script> alert('Data berhasil dirubah')</script>";
        echo "<script>window.location.href='index.php?p=prodi'</script>";
        }
    }
}

if($_GET['proses']=='delete'){
    include 'konek.php';

    $hapus = mysqli_query($db, "DELETE FROM prodi WHERE kode='$_GET[id_hapus_prodi]'");
    if($hapus){
    echo "<script>window.location.href='index.php?p=prodi'</script>";
}
}
    
?>