<h4>Tambah Data</h4>
<br>
<h1 id="result"></h1>
<form action="index.php?mod=dosen&page=save" method="POST" id="form_dosen" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Dosen</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Dosen</label>
            <input type="text" name="nama" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nomer Induk Dosen</label>
            <input type="text" name="nomer" required class="form-control">

        </div>
        <div class="form-group">
            <label for="">Mengajar Di Prodi</label>
            <select name="mengajar" id="mengajar" required class="form-control">
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
            <button type="submit" class="btn btn-primary" id="form-submit">Save</button>
        </div>
    </div>
</form>