<?php
session_start();
$news_id = $_GET['news_id'];
echo "<form action='index.php?news_id=$news_id' method='post'>
          <textarea name='text' rows='5' cols='100' placeholder='Comentariul tau aici' ></textarea>
          <button type='submit' name='submit'>Posteaza Comentariu</button></form>";



?>



