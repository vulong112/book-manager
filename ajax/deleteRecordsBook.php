<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 12/07/2016
 * Time: 2:58 CH
 */

include "../config.php";
if(isset($_POST['book_id']) && isset($_POST['book_id'])!=''){
    $book_id = $_POST['book_id'];
    $query = "DELETE FROM book WHERE book_id = '$book_id'";
    if (!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
}

?>