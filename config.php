<?php
$username = 'root';
$password = '88888888';
$hostname = 'localhost';
$dbname = 'managerbook';

//$conn = mysqli_connect($hostname,$username,$password,$dbname);
//if(!$conn){
//    die(mysqli_connect_error());
//}

$con = new mysqli($hostname,$username,$password,$dbname);
if($con->connect_error){
    die("Connection failed: ".$con->connect_error);
}

//$sql = "select * from category";
//$kq = mysqli_query($conn,$sql);
//print_r($kq);
//echo var_dump($kq);
//
//
//$array = mysqli_fetch_array($kq);
//echo json_encode($array);

// 
//echo json_encode($array);
?>