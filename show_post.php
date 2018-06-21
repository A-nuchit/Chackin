
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
<body>
<?php
$link = mysqli_connect("localhost", "root", "", "Test_post");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM post ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        while($row = mysqli_fetch_array($result)){
                $username = $row['username'] ;
                $title =  $row['title'] ;
                $content = $row['content'] ;
                $time_post =  $row['time_post'] ;
                $post_id =  $row['post_id'] ;
            ?> 
             <div style="padding-top: 20px;">
                <div class = "border_show">
                    <name><?php echo $title; ?></name><br>
                    <timepost><?php echo $username; ?>   <?php echo $time_post; ?></timepost>
                    <p><?php echo $content; ?></p>
                <?php if ($_SESSION['username'] == $username){
                    ?> 
                 <a href='edit_post.php?post_id=<?php echo $post_id ?>' >Edit</a>
                 <a href='delete_post.php?post_id=<?php echo $post_id ?>'>Delete</a>
                <?php }  ?>
                </div>
            </div>
<?php
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</div>
</body>
