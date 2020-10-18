<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <link rel="stylesheet" href="../assets/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.boostrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="box">
    <div class="container">
  <h2 class="text-center">Login Admin</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Masukan Email">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password">
        <span><?=(isset($msg))?$msg: '' ?></span>
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>