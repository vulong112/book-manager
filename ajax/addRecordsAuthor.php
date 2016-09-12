<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 13/07/2016
 * Time: 2:27 CH
 */

include "../config.php";

if(isset($_POST['ai']) && isset($_POST['fn']) && isset($_POST['em']) && isset($_POST['pn']) && isset($_POST['bd']) && isset($_POST['ad'])){

    $ai = $_POST['ai'];
    $fn = $_POST['fn'];
    $em = $_POST['em'];
    $pn = $_POST['pn'];
    $bd = $_POST['bd'];
    $ad = $_POST['ad'];

    
   $query = "INSERT INTO author(author_id,fullname,email,phonenumber,birthday,address) VALUE ('$ai','$fn','$em','$pn','$bd','$ad')";

    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
    echo "1 Record Add";
}

?>