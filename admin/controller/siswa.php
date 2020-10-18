<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $content="view/siswa/tambah.php";
    include_once "view/template.php";
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['nama'])){
                $err['nama']="Nama Wajib";
            }
            if(empty($_POST['nim'])){
                $err['nim']="wajib diisi";
            }
            if(empty($_POST['prodi'])){
                $err['prodi']="wajib diisi";
            }
            if(empty($_POST['no_hp'])){
                $err['no_hp']="wajib diisi";
            }
            if(!isset($err)){
            $sql = "INSERT INTO siswa (nama, nim, prodi, no_hp) 
            VALUES ('$_POST[nama]', '$_POST[nim]', '$_POST[prodi]', '$_POST[no_hp]')";
            if ($conn->query($sql) === TRUE) {
                header('Location: http://localhost/E-Learning/admin/?mode=siswa');
            }else {
                $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }}
        }else{
            $err['msg']="tidak diijinkan";
        }
    break;
    case 'edit':
        $siswa ="select * from siswa where md5(nama)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        $_POST=$siswa->fetch_assoc();
        //var_dump($siswa);
        $content="view/siswa/tambah.php";
        include_once 'view/template.php';
    break;
    case 'delete';
        $siswa ="delete from siswa where md5(siswa)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        header('Location: http://localhost/E-Learning/admin/?mode=siswa');
    break;
    default:
    $sql = "select * from siswa";
    $siswa=$conn->query($sql);
    $conn->close();
    $content="view/siswa/tampil.php";
    include_once "view/template.php";
}
?>
