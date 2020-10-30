<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Sistem Informasi E-Learning </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>

    </nav>

    <div class="content">
      <div class="container-fluid">
        <div class="row content">
          <div class="col-sm-3 sidenav">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="../admin/controller/siswa.php">Data Mahasiswa</a></li>
              <li class="active"><a href="../admin/controller/dosen.php">Data Dosen</a></li>
            </ul><br>
          </div>
          <div class="col-sm-9">
            <?php include_once $content;  ?>
          </div>
        </div>
        
</body>

</html>