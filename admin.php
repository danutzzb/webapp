<?php
require_once 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['submit']) && isset($_POST['text']) ){
$body = $_POST['text'];
$query = "insert into webapp.news(news) values ('$body') ";
$data = mysqli_query($conn, $query);
}
var_dump($conn)
?>

<html>
<header>
<header>
<body>
<form action="" method="post">
                    <textarea name="text" rows="5" cols="100" placeholder="Comentariul tau aici" ></textarea>
                    <input type="submit" value="Posteaza Comentariu" name="submit">
                    
                </form>
       </body> 
</html>



    
    
    