<div class="container-fluid">
    <div class="row">
        <div class="pull-left">
            <h4>Daftar Dosen</h4>
        </div>
        <div class="pull-right">
            <a href="index.php?mod=dosen&page=add">
                <button class="btn btn-primary">add</button>
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        #
                    </td>
                    <td>Nama Dosen</td>
                    <td>Nomor Induk Dosen</td>
                    <td>Mengajar Mata Kuliah</td>
                    <td>No Handphone</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php if($siswa!=NULL){
                $no=1;
                foreach($siswa as $row){?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['nomer']?></td>
                    <td><?=$row['mengajar']?></td>
                    <td><?=$row['no_hp']?></td>
                    <td>
                        <a href="index.php?mod=dosen&page=edit&id=<?=md5($row['nama'])?>"><i
                                class="fa fa-pencil"></i> </a>
                        <a href="index.php?mod=dosen&page=delete&id=<?=md5($row['nama'])?>"><i
                                class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                <?php $no++;
                }
            } 
            ?>
            </tbody>
        </table>
    </div>