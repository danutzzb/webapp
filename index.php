<?php
require_once 'config.php';
session_start();
$ses = $_SESSION['username'];
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['submit']) && isset($_POST['text']) ){
$body = $_POST['text'];
$query = "insert into webapp.comentarii(user_id,comment)
    VALUES ((SELECT user_id FROM utilizatori WHERE username = '$ses'), '$body')";
$data = mysqli_query($conn, $query);
//echo $body;
}
//var_dump($conn);
//
//function pr_array($array){
//    echo '<pre>';
//    print_r($array);
//    echo '</pre>';
//}
//pr_array($_SESSION);
        
?>

<style>
    #wrapper {
        width: 1200px;
    }
    
    a {
        background-color: cadetblue;
        margin: 5px;
        padding: 5px;
        float: right;
        color: white;
    } 
    a:hover {
        background-color: #999900;
    }
    
    a:click {
       padding-bottom: 3px;
    }
    a:visited {
        text-decoration: none;
        decoration: none;
    }
    #header {
        height: 100px;
    }
    
    #news {
        
        width: 850px;
    }
    #com {
        background-color: #0099cc;
        margin: 5px;
        padding: 3px;
    }
    #comment {
        background-color: #ccccff;
        border: 1px solid aliceblue;
        margin: 3px;
        padding: 3px;
    }
    
</style>
<html>
    <body>
        <div id="wrapper">
        <div id="header">
            
            <a href="signup.html">Sign Up</a>
            <a href="login.html">Sign In</a>
                        
        </div>
        
        <div id="news">
            <article>
                
                <?php
                $query = "select news from news";
                $data = mysqli_query($conn, $query);
                
                $result = $data;
                while ($result = $data->fetch_assoc()){
                    foreach ($result as $key=>$value){
                        echo "<div id=".'com'.">";
                        echo $value;
                        echo "</div>";
                        echo "<br>";
                        $query = "select comment from comentarii";
                        $com = mysqli_query($conn, $query);
                
                        $comment = $com;
                        while ($comment = $com->fetch_assoc()){
                            foreach ($comment as $key=>$value){
                            echo "<div id=".'comment'.">";
                            echo $value;
                            echo "</div>";
                            echo "<br>";
                        
                            
                    };
                };
                        echo "<form action='' method='post'>
                            <textarea name='text' rows='5' cols='100' placeholder='Comentariul tau aici' ></textarea>
                            <button type='submit' name='submit'>Posteaza Comentariu</button></form>";
                            
                    };
                };
                
                
                //var_dump($com)
                ?>

                
            </article>
        </div>
        <div id="side">
            
       </div>
    </div>
    </body>
    
</html>