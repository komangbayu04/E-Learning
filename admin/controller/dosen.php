<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $content="view/dosen/tambah.php";
    include_once "view/template.php";
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['nama'])){
                $err['nama']="Nama Wajib";
            }
            if(empty($_POST['nomer'])){
                $err['nomer induk']="wajib diisi";
            }
            if(empty($_POST['mengajar'])){
                $err['mengajar']="wajib diisi";
            }
            if(empty($_POST['no_hp'])){
                $err['no_hp']="wajib diisi";
            }
            if(!isset($err)){
            $sql = "INSERT INTO dosen (nama, nomer, mengajar, no_hp) 
            VALUES ('$_POST[nama]', '$_POST[nomer]', '$_POST[mengajar]', '$_POST[no_hp]')";
            if ($conn->query($sql) === TRUE) {
                header('Location: http://localhost/E-Learning/admin/?mode=dosen');
            }else {
                $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }}
        }else{
            $err['msg']="tidak diijinkan";
        }
    break;
    case 'edit':
        $siswa ="select * from dosen where md5(nama)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        $_POST=$siswa->fetch_assoc();
        //var_dump($siswa);
        $content="view/dosen/tambah.php";
        include_once 'view/template.php';
    break;
    case 'delete';
        $siswa ="delete from dosen where md5(siswa)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        header('Location: http://localhost/E-Learning/admin/?mode=dosen');
    break;
    default:
    $sql = "select * from dosen";
    $siswa=$conn->query($sql);
    $conn->close();
    $content="view/dosen/tampil.php";
    include_once "view/template.php";
}
?>