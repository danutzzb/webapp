<?php
require_once 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['submit']) && isset($_POST['text']) ){
    $body = mysqli_real_escape_string($conn, $_POST['text']) ;
    $query = "insert into webapp.news(news,news_date) values ('$body', CURRENT_TIMESTAMP) ";
    mysqli_query($conn, $query);
}

?>


<form action="" method="post">
                    <textarea name="text" rows="5" cols="100" placeholder="Comentariul tau aici" ></textarea>
                    <input type="submit" value="Posteaza Comentariu" name="submit">
                    
                </form>
       </body> 




    
    
    