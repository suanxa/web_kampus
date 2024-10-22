<?php

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':

?>
        <h1 class="alert alert-success text-center p-1 mt-1">Data Dosen</h1>

        <a href="index.php?p=dosen&aksi=tambah" class="btn btn-primary mb-3">Tambah Dosen</a>

        <table class="table table-striped table-hover border border-primary">
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Nama Dosen</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>No telp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php
            include 'konek.php';
            $ambil = mysqli_query($db, "SELECT * FROM prodi,dosen WHERE prodi.kode=dosen.prodi_id");
            $no = 1;
            while ($data = mysqli_fetch_array($ambil)) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['nama_dosen'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['nama_prodi'] ?></td>
                    <td><?= $data['notelp'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <a href="index.php?p=dosen&aksi=edit&id_edit_dosen=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="proses_dosen.php?proses=delete&id_hapus_dosen=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('yakin menghapus data ?')">Hapus</a>
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
        <h1 class="mb-4 text-center mt-1">Dosen</h1>
        <div class="row justify-content-center">

            <div class="col-6">
                <form method="post" action="proses_dosen.php?proses=insert">

                    <div class="mb-2">
                        <label for="" class="form-label">Nip</label>
                        <input type="text" class="form-control border border-primary" id="" name="nip">

                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Nama dosen</label>
                        <input type="text" class="form-control border border-primary" id="" name="namadosen">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control border border-primary" id="" name="email">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Prodi</label>
                        <select name="prodiid" class="form-select">
                            <option value="">--pilih prodi--</option>
                            <?php
                            include 'konek.php';
                            $prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_array($prodi)) {
                                echo "<option value=" . $data_prodi['kode'] . ">" .
                                    $data_prodi['nama_prodi'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">No Telpon</label>
                        <input type="number" class="form-control border border-primary" id="" name="notelpon">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Alamat</label>
                        <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
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
        $ambil_dosen = mysqli_query($db, "SELECT * FROM dosen WHERE id='$_GET[id_edit_dosen]'");
        $data_dosen = mysqli_fetch_array($ambil_dosen);
    ?>
        <h1 class="mb-4 text-center mt-1">Prodi</h1>
        <div class="row justify-content-center">
            <div class="col-6">

                <form method="post" action="proses_dosen.php?proses=update">

                    <div class="mb-2">
                        <input type="hidden" class="form-control border border-primary" id="" name="id" value="<?= $data_dosen['id'] ?>">
                        <label for="" class="form-label">Nip</label>
                        <input type="text" class="form-control border border-primary" id="" name="nip" value="<?= $data_dosen['nip'] ?>">

                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Nama dosen</label>
                        <input type="text" class="form-control border border-primary" id="" name="namadosen" value="<?= $data_dosen['nama_dosen'] ?>">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control border border-primary" id="" name="email" value="<?= $data_dosen['email'] ?>">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Prodi</label>
                        <select name="prodiid" class="form-select">
                            <option value="">--pilih prodi--</option>
                            <?php
                            include 'konek.php';
                            $prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_array($prodi)) {
                                $selected = ($data_prodi['kode'] == $data_dosen['prodi_id']) ?
                                    'selected' : '';
                                echo "<option value=" . $data_prodi['kode'] . " $selected>" .
                                    $data_prodi['nama_prodi'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">No Telpon</label>
                        <input type="number" class="form-control border border-primary" id="" name="notelpon" value="<?= $data_dosen['notelp'] ?>">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Alamat</label>
                        <textarea class="form-control border border-primary" id="exampleFormControlTextarea1" rows="3" name="alamat"><?= $data_dosen['alamat'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>

                </form>
            </div>
        </div>

<?php
        break;
}

?>