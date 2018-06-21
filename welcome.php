<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
<body class="bg-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
  <a class="navbar-brand" href="welcome.php">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="nav-link"href="welcome.php" >Wellcome , <?php echo htmlspecialchars($_SESSION['username']); ?></a>
    </form>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary" href="logout.php" >Sign Out</a>
    </form>
  </div>
</nav>
<div class="container" style="width: 30%; padding-top: 50px;" >
<div class="border">
    <?php require_once 'insert_post.php'; ?>
 </div>
 <div style=" padding-top: 30px"> 
    <?php require_once 'show_post.php'; ?>
 </div>
</div>
</body>
</html>