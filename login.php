<?php include('config.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>spordipäev 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
<body>
<?php
	session_start();
	if (isset($_SESSION['tuvastamine'])) {
	    header('Location: admin.php');
	    exit();
	}
	  //kontrollime kas väljad on täidetud
	if (!empty($_POST['login']) && !empty($_POST['pass'])) {

		
      $login = htmlspecialchars(trim($_POST['login']));
      $pass = htmlspecialchars(trim($_POST['pass']));

      
      $paring = "SELECT * FROM kasutajad WHERE kasutaja='$login'";
      $valjund = mysqli_query($yhendus, $paring);

if ($valjund && mysqli_num_rows($valjund) == 1) {
      $user = mysqli_fetch_assoc($valjund);
    if (password_verify($pass, $user['parool'])) {
          $_SESSION['tuvastamine'] = 'misiganes';
          header('Location: admin.php');
          exit();
      } else {
          echo "kasutaja või parool on vale";
      }
}
}
?>
<h1>Login</h1>
<form action="" method="post">
	Login: <input type="text" name="login"><br>
	Password: <input type="password" name="pass"><br>
	<input type="submit" value="Logi sisse">
</form>
</body>