<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 13/07/2016
 * Time: 3:20 CH
 */

include "../config.php";
if(isset($_POST['author_id']) && isset($_POST['author_id'])!=''){
    $author_id = $_POST['author_id'];
    $query = "DELETE FROM author WHERE author_id = '$author_id'";
    if (!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
}

?>