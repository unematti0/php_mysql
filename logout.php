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
if (!isset($_SESSION['tuvastamine'])) {
	header('Location: login.php');
	exit();
}
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
	exit();
}
?>
</body>