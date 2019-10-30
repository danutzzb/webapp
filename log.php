<?php
 session_start();
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
   
 
     $_SESSION["username"] = $user;
     $_SESSION['access'] = '$user';
     header("Location: index.php");
   
    
    
   
}

 else {
    echo 'User or Password did not match';    
}

mysqli_fetch_array($data);
var_dump($query);

