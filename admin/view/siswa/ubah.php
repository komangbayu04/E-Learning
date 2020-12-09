<h4>Ubah Data</h4>
<br>
<form action="index.php?mod=siswa&page=proses_edit" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Mahasiswa</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Mahasisswa</label>
            <input type="text" name="nama" required value="<?= (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>"
                class="form-control">
            <span class="text-danger"><?= (isset($err['nama'])) ? $err['nama'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">Nim</label>
            <input type="text" name="nim" required value="<?= (isset($_POST['nim'])) ? $_POST['nim'] : ''; ?>"
                class="form-control">

        </div>
        <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi" id="prodi" required class="form-control">
                <?php
                $pti = '';
                $mi = '';
                $si = '';
                $ilkom = '';
                if ($_POST['prodi'] == "Pendidikan Teknik Informatika") {
                    $pti = "selected";
                } else if ($_POST['prodi'] == "Sistem Informasi") {
                    $si = "selected";
                } else if ($_POST['prodi'] == "Ilmu Komputer") {
                    $ilkom = "selected";
                } else if ($_POST['prodi'] == "Manajemen Informatika") {
                    $mi = "selected";
                }
                ?>
                <option value="">Pilih Nama Prodi</option>
                <option value="Sistem Informasi" <?= $si ?>>Sistem Informasi</option>
                <option value="Pendidikan Teknik Informatika" <?= $pti ?>>Pendidikan Teknik Informatika</option>
                <option value="Ilmu Komputer" <?= $ilkom ?>>Ilmu Komputer</option>
                <option value="Manajemen Informatika" <?= $mi ?>>Manajemen Informatika</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">No Handphone</label>
            <input type="number" name="no_hp" required value="<?= (isset($_POST['no_hp'])) ? $_POST['no_hp'] : ''; ?>"
                class="form-control">

        </div>
        <input type="hidden" name="id" value="<?= (isset($_POST['id'])) ? $_POST['id'] : ''; ?>">
        <input type="hidden" name="file_old" value="<?= (isset($_POST['foto_siswa'])) ? $_POST['foto_siswa'] : ''; ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>