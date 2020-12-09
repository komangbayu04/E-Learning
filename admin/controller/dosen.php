<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $content="view/dosen/tambah.php";
    include_once "view/template.php";
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if ($_FILES['foto']['error'] == 0) {
                $eks_foto_boleh = array('png', 'jpg');
                $nama_foto = $_FILES['foto']['name'];
                $foto = explode('.', $nama_foto);
                $eksfoto = strtolower(end($foto));
                $ukuranfoto = $_FILES['foto']['size'];
                if (in_array($eksfoto, $eks_foto_boleh) === true) {
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    $new_Foto = uniqid() . "_" . $_POST['nama'];
                    $new_Foto .= '.';
                    $new_Foto .= $eksfoto;
                    // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/E-Learning/';
                    // Target
                    $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                    if (empty($_POST['nama'])) {
                        $err['nama'] = "Nama Wajib";
                    }
                    if (empty($_POST['nomer'])) {
                        $err['nomer induk'] = "wajib diisi";
                    }
                    if (empty($_POST['mengajar'])) {
                        $err['mengajar'] = "wajib diisi";
                    }
                    if (empty($_POST['no_hp'])) {
                        $err['no_hp'] = "wajib diisi";
                    }
                    if (!isset($err)) {
                        $sql = "INSERT INTO dosen (foto_dosen, nama, nomer, mengajar, no_hp) 
            VALUES ('$new_Foto','$_POST[nama]', '$_POST[nomer]', '$_POST[mengajar]', '$_POST[no_hp]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                        }
                    }
                }
            }
            
        }else{
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
        }
    break;
    case 'edit':
        $siswa = "select * from dosen where md5(id)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        $_POST=$siswa->fetch_assoc();
        //var_dump($siswa);
        $content = "view/dosen/ubah.php";
        include_once 'view/template.php';
        break;
    case 'proses_edit':
        $user_cari = "SELECT * FROM dosen WHERE id='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['nama'] == $user_cari['nama'] && $_POST['nomer'] == $user_cari['nomer'] && $_POST['mengajar'] == $user_cari['mengajar'] && $_POST['no_hp'] == $user_cari['no_hp'] && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php?mod=dosen');
        } else {
            if ($_FILES['foto']['error'] == 0) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . "/E-Learning/assets/upload/" . $_POST['file_old'])) {
                    $eks_foto_boleh = array('png', 'jpg');
                    $nama_foto = $_FILES['foto']['name'];
                    $foto = explode('.', $nama_foto);
                    $eksfoto = strtolower(end($foto));
                    $ukuranfoto = $_FILES['foto']['size'];
                    $tmpfoto = $_FILES['foto']['tmp_name'];
                    if (in_array($eksfoto, $eks_foto_boleh) === true) {
                        //  Generate Nama Gambar Baru
                        $new_Foto = uniqid() . "_" . $_POST['nama'];
                        $new_Foto .= '.';
                        $new_Foto .= $eksfoto;
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/E-Learning/';
                        // Target
                        $target_foto = $destination_path . 'assets/upload/' . $new_Foto;
                        $in_nama = $_POST['nama'];
                        $in_nomer = $_POST['nomer'];
                        $in_mengajar = $_POST['mengajar'];
                        $in_no_hp = $_POST['no_hp'];
                        $in_sql =
                            "UPDATE dosen SET foto_dosen='$new_Foto', nama ='$in_nama',nomer= '$in_nomer',mengajar= '$in_mengajar',no_hp='$in_no_hp' WHERE id='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                        }
                    }
                }
            } else {
                $in_nama = $_POST['nama'];
                $in_nomer = $_POST['nomer'];
                $in_mengajar = $_POST['mengajar'];
                $in_no_hp = $_POST['no_hp'];
                $in_sql =
                    "UPDATE dosen SET nama ='$in_nama',nomer= '$in_nomer',mengajar= '$in_mengajar',no_hp='$in_no_hp' WHERE id='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location: http://localhost/E-Learning/admin/?mod=dosen');
                }
            }
        }
        
        break;
    case 'delete';
        $sql_where = "SELECT * FROM dosen WHERE md5(id)='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/E-Learning/assets/upload/" . $user_cari['foto_dosen'])) {
            $siswa = "delete from dosen where md5(id)='$_GET[id]'";
            $siswa = $conn->query($siswa);
            $_SESSION['ket'] = '1';
            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/E-Learning/admin/?mod=dosen');
        }

    
    break;
    default:
    $sql = "select * from dosen";
    $siswa=$conn->query($sql);
    $conn->close();
    $content="view/dosen/tampil.php";
    include_once "view/template.php";
}
?>