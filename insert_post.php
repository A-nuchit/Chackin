<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Test_post');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $title = $content = "";
$username_err =  $title_err = $content_err = "";

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: welcome.php");
  exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

     if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a title";
    }
    else{
        $title = trim($_POST["title"]);
    }
    
    // Validate password
    if(empty(trim($_POST['content']))){
        $content_err = "Please enter content.";     
    }
    else{
        $content = trim($_POST["content"]);
    }
    
    if(empty($title_err) && empty($content_err)){
        $sql = "INSERT INTO post (title,content,time_post,username) VALUES (?, ? , ? , ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_title,$param_content, $param_time,$param_name);
            echo $title;
            $param_title = $title;
            $param_content = $content;
            $param_time = date("Y-m-d h:i:sa");
            $param_name = $_SESSION['username'];
            if(mysqli_stmt_execute($stmt)){
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div class="wrapper">
        <h2>Insert post</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $title; ?>">
                <text_t><span class="help-block"><?php echo $title_err; ?></span></text_t>
            </div>
            <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                <textarea rows= "5" type="text" name="content" placeholder="Content" class="form-control" value="<?php echo $content; ?>"></textarea>
                <text_t><span class="help-block"><?php echo $content_err; ?></span></text_t>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>