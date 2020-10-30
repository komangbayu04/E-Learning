<h4>Tambah Data</h4>
<br>
<form action="index.php?mod=dosen&page=save" method="POST">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Nama Dosen</label>
            <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
        <div class="form-group">
            <label for="">Nomer Induk Dosen</label>
            <input type="text" name="nomer" required value="<?=(isset($_POST['nomer']))?$_POST['nomer']:'';?>" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="">Mengajar Mata Kuliah</label>
            <input type="text" name="mengajar" required value="<?=(isset($_POST['mengajar']))?$_POST['mengajar']:'';?>" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="">No Handphone</label>
            <input type="number" name="no_hp" required value="<?=(isset($_POST['no_hp']))?$_POST['no_hp']:'';?>" class="form-control">
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
