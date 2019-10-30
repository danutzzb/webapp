<?php

require_once 'config.php';
session_start();

$ses = $_SESSION['username'];


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['submit']) && isset($_POST['text']) ){
$body = $_POST['text'];
$query = "insert into webapp.postari(post) values ('$body') ";
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus eros eu orci sodales hendrerit nec ac ipsum.
                   Cras a finibus mauris, id maximus metus. Sed ornare neque at nulla interdum interdum. Sed finibus lacus quis consectetur consequat. 
                   Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                   Suspendisse suscipit arcu nulla, nec sollicitudin augue elementum eu. Duis pretium pretium neque id egestas. Quisque metus libero, 
                   fermentum a scelerisque vel,Curabitur eget nisl bibendum lorem rutrum posuere ut faucibus neque. Cras dignissim, nisi et ornare feugiat, tortor odio eleifend 
                   ante, vitae consectetur neque neque quis lacus. Donec eu sem ligula. Maecenas congue hendrerit turpis eget dignissim. </p>
                <?php
                $query = "select post from postari";
                $data = mysqli_query($conn, $query);
                
                $result = $data;
                while ($result = $data->fetch_assoc()){
                    foreach ($result as $key=>$value){
                        echo "<div id=".'com'.">";
                        echo $value;
                        echo "</div>";
                        echo "<br>";
                    }
                };
                ?>
                <form action="" method="post">
                    <textarea name="text" rows="5" cols="100" placeholder="Comentariul tau aici" ></textarea>
                    <input type="submit" value="Posteaza Comentariu" name="submit">
                    
                </form>
                
            </article>
        </div>
        <div id="side">
            
       </div>
    </div>
    </body>
    
</html>



