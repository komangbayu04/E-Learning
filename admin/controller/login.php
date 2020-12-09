<?php
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email = $_POST['email'];
    $psw = md5($_POST['password']);
    $sql = "SELECT * FROM data_login WHERE password ='$psw' and email ='$email' and active='y'";
    $user = $conn->query($sql);
    if($user->num_rows > 0){
        $sess=$user->fetch_array();
        $_SESSION['login']['id_admin']=$sess['id_admin'];
        $_SESSION['login']['email'] = $sess['email'];
        header('Location: http://localhost/E-Learning/admin/index.php?mod=siswa');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once 'view/v_login.php';
    }
}else{
    include_once 'view/v_login.php';
}
?>