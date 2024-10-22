<?php

if($_GET['proses']=='insert'){

    if (isset($_POST['submit'])) {

        include 'konek.php';
        $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $hobies = implode(",", $_POST['hobi']);
        $sql = mysqli_query($db, "Insert into mahasiswa(nama,nim,email,tanggal_lahir,jenis_kelamin,hobi,alamat)
    VALUES ('$_POST[nama]','$_POST[nim]','$_POST[email]','$tgl','$_POST[jk]','$hobies','$_POST[alamat]')");
  
        if ($sql) {
          echo "<script> alert('Data berhasil disimpan')</script>";
          echo "<script>window.location.href='index.php?p=mhs'</script>";
        }
      }

}

if($_GET['proses']=='update'){
    
    if (isset($_POST['submit'])) {

        include 'konek.php';
        $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $hobies = implode(",", $_POST['hobi']);
        $sql = mysqli_query($db,"UPDATE mahasiswa SET nama = '$_POST[nama]',email = '$_POST[email]',tanggal_lahir = '$tgl',jenis_kelamin = '$_POST[jk]',hobi = '$hobies',alamat = '$_POST[alamat]' WHERE nim='$_POST[nim]'");

        if ($sql) {
            echo "<script> alert('Data berhasil diedit')</script>";
            echo "<script>window.location.href='index.php?p=mhs'</script>";
        }
    }
    
}

if($_GET['proses']=='delete'){
    include 'konek.php';
$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[id_hapus]'");
if($hapus){
    header('location:index.php?p=mhs');
}
}
    
?>