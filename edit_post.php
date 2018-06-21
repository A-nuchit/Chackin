<?php 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Test_post');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}

$username = $title = $content = "";
$username_err =  $title_err = $content_err = "";

if(empty($title)){
	$id  = $_GET['post_id'];
}

$sql = "SELECT * FROM post WHERE post_id = $id";
if($result = mysqli_query($link, $sql)){
        $row = mysqli_fetch_array($result);
                $username = $row['username'] ;
                $title =  $row['title'] ;
                $content = $row['content'] ;
                $time_post =  $row['time_post'] ;
                $post_id =  $row['post_id'] ;
        mysqli_free_result($result);
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt:400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-1">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
  <a class="navbar-brand" href="welcome.php">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
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
    <div class="container" style="width: 40%; padding-top: 50px;">
    	<div class="border" >
        <h2>Edit Post</h2>
        <form action="update.php?post_id=<?php echo $id ?>" method="post">
            <div class="form-group">
                <input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $title; ?>">

            </div>
            <div class="form-group">
                <textarea rows= "5" type="text" name="content" placeholder="Content" class="form-control" value="<?php echo $content; ?>"><?php echo $content; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div> 
    </div>   
</body>
</html>