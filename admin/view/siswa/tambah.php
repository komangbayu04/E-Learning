<h4>Tambah Data</h4>
<br>
<form action="index.php?mod=siswa&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Mahasiswa</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Mahasisswa</label>
            <input type="text" name="nama" required class="form-control">
            <span class="text-danger"><?= (isset($err['nama'])) ? $err['nama'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">Nim</label>
            <input type="text" name="nim" required class="form-control">

        </div>
        <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi" id="prodi" required class="form-control">
                <option value="">Pilih Nama Prodi</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Pendidikan Teknik Informatika">Pendidikan Teknik Informatika</option>
                <option value="Ilmu Komputer">Ilmu Komputer</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>

        </div>
        <div class="form-group">
            <label for="">No Handphone</label>
            <input type="number" name="no_hp" required class="form-control">

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>