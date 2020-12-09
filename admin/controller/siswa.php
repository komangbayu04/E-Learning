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
                    if (empty($_POST['nim'])) {
                        $err['nim'] = "wajib diisi";
                    }
                    if (empty($_POST['prodi'])) {
                        $err['prodi'] = "wajib diisi";
                    }
                    if (empty($_POST['no_hp'])) {
                        $err['no_hp'] = "wajib diisi";
                    }
                    if (!isset($err)) {
                        $sql = "INSERT INTO siswa (foto_siswa, nama, nim, prodi, no_hp) 
            VALUES ('$new_Foto','$_POST[nama]', '$_POST[nim]', '$_POST[prodi]', '$_POST[no_hp]')";
                        if ($conn->query($sql) === TRUE) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        }
                    }
                }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
    break;
    case 'edit':
        $siswa = "select * from siswa where md5(id)='$_GET[id]'";
        $siswa=$conn->query($siswa);
        $_POST=$siswa->fetch_assoc();
        //var_dump($siswa);
        $content = "view/siswa/ubah.php";
        include_once 'view/template.php';
        break;
    case 'proses_edit':
        $user_cari = "SELECT * FROM siswa WHERE id='$_POST[id]'";
        $user_cari = $conn->query($user_cari)->fetch_assoc();
        if ($_POST['nama'] == $user_cari['nama'] && $_POST['no_hp'] == $user_cari['no_hp'] && $_POST['nim'] == $user_cari['nim'] && $_POST['prodi'] == $user_cari['prodi'] && $_FILES['foto']['error'] != 0) {
            $_SESSION['ket'] = '1';
            header('Location:' . $con->site_url() . 'admin/index.php');
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
                        $in_nim = $_POST['nim'];
                        $in_prodi = $_POST['prodi'];
                        $in_no_hp = $_POST['no_hp'];
                        $in_sql =
                            "UPDATE siswa SET foto_siswa ='$new_Foto', nama ='$in_nama',nim= '$in_nim',prodi= '$in_prodi',no_hp='$in_no_hp' WHERE id='$_POST[id]'";
                        if ($conn->query($in_sql) === true) {
                            move_uploaded_file($tmpfoto, $target_foto);
                            $_SESSION['ket'] = '1';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        } else {
                            $_SESSION['ket'] = '2';
                            header('Location:' . $con->site_url() . 'admin/index.php');
                        }
                    }
                }
            } else {
                $in_nama = $_POST['nama'];
                $in_nim = $_POST['nim'];
                $in_prodi = $_POST['prodi'];
                $in_no_hp = $_POST['no_hp'];
                $in_sql =
                    "UPDATE siswa SET nama ='$in_nama',nim= '$in_nim',prodi= '$in_prodi',no_hp='$in_no_hp' WHERE id='$_POST[id]'";
                if ($conn->query($in_sql) === true) {
                    $_SESSION['ket'] = '1';
                    header('Location:' . $con->site_url() . 'admin/index.php');
                } else {
                    $_SESSION['ket'] = '2';
                    header('Location:' . $con->site_url() . 'admin/index.php');
                }
            }
        }
        break;
    case 'delete';
        $sql_where = "SELECT * FROM siswa WHERE md5(id)='$_GET[id]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (unlink($_SERVER['DOCUMENT_ROOT'] . "/E-Learning/assets/upload/" . $user_cari['foto_siswa'])) {
            $siswa = "DELETE FROM siswa WHERE md5(id)='$_GET[id]'";
            $siswa = $conn->query($siswa);
            $_SESSION['ket'] = '1';
            header('Location: http://localhost/E-Learning/admin/index.php');
        } else {
            $_SESSION['ket'] = '2';
            header('Location: http://localhost/E-Learning/admin/index.php');
        }

        break;
    case 'ajax':
        $sql_where = "SELECT * FROM siswa WHERE nama LIKE '%$_GET[cari]%' OR nim LIKE '%$_GET[cari]%'";
        $siswa = $conn->query($sql_where);
        include_once "view/siswa/table.php";
        break;
    default:
    $sql = "select * from siswa";
    $siswa=$conn->query($sql);
    $conn->close();
    $content="view/siswa/tampil.php";
    include_once "view/template.php";
}
?>