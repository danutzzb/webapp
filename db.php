<?php
require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$prenume = mysqli_real_escape_string($conn,$_POST['prenume']);
$nume = mysqli_real_escape_string($conn,$_POST['nume']);
$user = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['psw']);
$psw = hash('sha256', $pass);

$add = "insert into utilizatori(prenume, nume, username, parola)values('$prenume', '$nume', '$user', '$psw')";

    
if(mysqli_query($conn, $add) ){
    header("Location: index.php");
    echo 'User succesfully added to database';
   
 
}
else{
    echo 'error';
}

  

    