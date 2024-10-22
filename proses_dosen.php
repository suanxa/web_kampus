<?php

if ($_GET['proses'] == 'insert'){
    if (isset($_POST['submit'])) {

        include 'konek.php';
        $sql = mysqli_query($db, "INSERT INTO dosen(nip,nama_dosen,email,prodi_id,notelp,alamat)
        VALUES ('$_POST[nip]','$_POST[namadosen]','$_POST[email]','$_POST[prodiid]','$_POST[notelpon]','$_POST[alamat]')");
      
        if ($sql) {
          echo "<script> alert('Data berhasil disimpan')</script>";
          echo "<script>window.location.href='index.php?p=dosen'</script>";
        }
      }
}

if ($_GET['proses'] == 'update'){
    if (isset($_POST['submit'])) {

        include 'konek.php';
        $sql = mysqli_query($db, "UPDATE dosen SET nip= '$_POST[nip]',nama_dosen= '$_POST[namadosen]',email= '$_POST[email]',prodi_id= '$_POST[prodiid]',notelp= '$_POST[notelpon]',alamat= '$_POST[alamat]' WHERE id='$_POST[id]'");

        if ($sql) {
            echo "<script> alert('Data berhasil dirubah')</script>";
            echo "<script>window.location.href='index.php?p=dosen'</script>";
        }
    }
}

if ($_GET['proses'] == 'delete'){
    include 'konek.php';

    $hapus = mysqli_query($db, "DELETE FROM dosen WHERE id='$_GET[id_hapus_dosen]'");
    if($hapus){
        echo "<script>window.location.href='index.php?p=dosen'</script>";
    }
    
}
?>