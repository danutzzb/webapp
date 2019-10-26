<?php
require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST['email']) || isset($_POST['psw']) || isset($_POST['Login'])){
    
     

    $user = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['psw']);
    $psw = hash('sha256', $pass);
}


$query = "SELECT username FROM utilizatori WHERE username = '$user' AND parola = '$psw' ";
$data = mysqli_query($conn, $query);

if(mysqli_num_rows($data)==1){
    session_start();
 
     $_SESSION['access'] = '$user';
     header("Location: postari.html");
   
    $row = mysqli_fetch_array($data);
    
    $user = $row['nume_utilizator'];
    
    echo  $user . ' succesfully connected to database';
}

 else {
    echo 'User or Password did not match';    
}

mysqli_fetch_array($data);
var_dump($query);

