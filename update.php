<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Test_post');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$title = $_POST["title"];
$content = $_POST["content"];
$id = $_GET["post_id"];

         $sql = "UPDATE post SET title='$title',content='$content' where post_id = $id ";
         if ($link->query($sql) === TRUE) {
    		echo "Record updated successfully";
    		header("location: welcome.php");
		 } else {
    		echo "Error updating record: " . $link->error;
		 }
    mysqli_close($link);

 ?>