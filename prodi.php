<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>

<h1 class="alert alert-success text-center p-1 mt-1 ">Data prodi</h1>

<a href="index.php?p=prodi&aksi=tambah" class="btn btn-primary mb-3 mt-1">Tambah prodi</a>

<table class="table table-striped table-hover border border-primary">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Kode Prodi</th>
        <th>Jenjang prodi</th>
        <th>Aksi</th>
    </tr>

    <?php
    include 'konek.php';
    $ambil = mysqli_query($db, "SELECT * FROM prodi");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['nama_prodi'] ?></td>
            <td><?= $data['kode'] ?></td>
            <td><?= $data['jenjang_prodi'] ?></td>
            <td>
                <a href="index.php?p=prodi&aksi=edit&id_edit_prodi=<?=$data['kode']?>" class="btn btn-warning">Edit</a>
                <a href="proses_prodi.php?proses=delete&id_hapus_prodi=<?=$data['kode']?>" class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Hapus</a>
            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
</table>

<?php
        break;

    case 'tambah':
    ?>
<h1 class="mb-4 text-center mt-1">Prodi</h1>
<div class="row justify-content-center">

<div class="col-6">


    <form method="post" action="proses_prodi.php?proses=insert">
      <div class="mb-2">
        <label for="" class="form-label">Nama Prodi</label>
        <input type="text" class="form-control border border-primary" id="" name="namaprodi">
      </div>

      <div class="mb-2">
        <label for="" class="form-label">Kode Prodi</label>
        <input type="text" class="form-control border border-primary" id="" name="kodeprodi">
      </div>


      <div class="row g-3 mb-4">
        <label for="" class="form-label ">Jenjang studi</label>
        <div class="col-sm mt-2">
          <select name="jenjangstudi" class="form-select border border-primary">
            <option value="">-Pilih jenjang</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
      </div>
      
    </form>


    </div>

</div>

<?php
        break;

    case 'edit':

        include 'konek.php';
$ambil_prodi = mysqli_query($db, "SELECT * FROM prodi WHERE kode='$_GET[id_edit_prodi]'");
$data_prodi = mysqli_fetch_array($ambil_prodi);

?>

<h1 class="mb-4 text-center mt-1">Prodi</h1>
<div class="row justify-content-center">
    <div class="col-6">


        <form method="post" action="proses_prodi.php?proses=update">
            <div class="mb-2">
                <label for="" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="namaprodi" value="<?= $data_prodi['nama_prodi'] ?>">
            </div>

            <div class="mb-2">
                <label for="" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control border border-primary" id="" name="kodeprodi" value="<?= $data_prodi['kode'] ?>">
            </div>


            <div class="row g-3 mb-4">
                <label for="" class="form-label ">Jenjang studi</label>
                <div class="col-sm mt-2">
                    <select name="jenjangstudi" class="form-select border border-primary">
                        <option value="">-Pilih jenjang</option>
                        <option value="D3" <?= ($data_prodi['jenjang_prodi'] == 'D3') ? 'selected' : '' ?>>D3</option>
                        <option value="D4" <?= ($data_prodi['jenjang_prodi'] == 'D4') ? 'selected' : '' ?>>D4</option>
                        <option value="S1" <?= ($data_prodi['jenjang_prodi'] == 'S1') ? 'selected' : '' ?>>S1</option>
                        <option value="S2" <?= ($data_prodi['jenjang_prodi'] == 'S2') ? 'selected' : '' ?>>S2</option>
                        <option value="S3" <?= ($data_prodi['jenjang_prodi'] == 'S3') ? 'selected' : '' ?>>S3</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </div>

        </form>
<?php
 break;
    }
    ?>