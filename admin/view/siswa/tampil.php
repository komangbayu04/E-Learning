<div class="container-fluid">
    <div class="row">
        <div class="pull-left">
            <h4>Daftar Mahasiswa </h4>
        </div>
        <div class="pull-right pl-3 mb-3">
            <a href="index.php?mod=siswa&page=add">
                <button class="btn btn-primary">Tambah Data Mahasiswa</button>
            </a>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <form>
                <input class="form-control" id="search_siswa" type="text" placeholder="Cari Nama atau Nim Siswa"
                    name="search">
            </form>
        </div>
    </div>
    <div class="row" id="result">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        #
                    </td>
                    <td>Foto</td>
                    <td>Nama</td>
                    <td>Nim</td>
                    <td>Prodi</td>
                    <td>No Handphone</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php if ($siswa != NULL) {
                    $no = 1;
                    foreach ($siswa as $row) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['foto_siswa'] ?>" width="75px" alt="">
                    </td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td>
                        <a href="index.php?mod=siswa&page=edit&id=<?= md5($row['id']) ?>" class="mr-3"><i
                                class="fa fa-pencil"></i>
                        </a>
                        <a href="index.php?mod=siswa&page=delete&id=<?= md5($row['id']) ?>"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>