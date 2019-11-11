<?php
require_once 'config.php';
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['submit']) && isset($_POST['text']) && isset($_GET['news_id'])){
    $ses = mysqli_real_escape_string($_SESSION['username']);
    $body = mysqli_real_escape_string($_POST['text']);
    $news_id = mysqli_real_escape_string($_GET['news_id']);
    $query = "insert into comentarii(user_id,comment,news_id)
        VALUES ((SELECT user_id FROM utilizatori WHERE username = '$ses'), '$body', $news_id)";
    mysqli_query($conn, $query);
}

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
            
            <a href="logout.php">Logout</a>
            <a href="signup.html">Sign Up</a>
            <a href="login.html">Sign In</a>
            
                        
        </div>
        
        <div id="news">
            <article>
                
                <?php
                $query = "select * from news";
                $data = mysqli_query($conn, $query);
                

                while ($result = $data->fetch_assoc()){
                    
                        
                        if(isset($_SESSION['username'])){
                                                             
                            echo "<a href=\"comment.php?news_id=".$result['news_id']."\">Comment</a>";
                        }
                        echo "<div id=\"com\">";
                        echo $result['news'];
                        echo "</div>";
                        echo "<br>";
                        
                        
                        $query = "select comment from comentarii where news_id=".$result['news_id'];
                        $com = mysqli_query($conn, $query);
                

                        
                        while ($comment = $com->fetch_assoc()){
                            foreach ($comment as $key=>$value){
                            echo "<div id=".'comment'.">";
                            echo $value;
                            echo "</div>";
                            echo "<br>";
                        
                        }
                            
                    }
                }
   
    ?>

                
            </article>
        </div>
        <div id="side">
            
       </div>
    </div>
    </body>
    
</html>