<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 10/07/2016
 * Time: 6:30 CH
 */

include "../config.php";

if(isset($_POST)){
    $bi = $_POST['bi'];
    $bn = $_POST['bn'];
    $ci = $_POST['ci'];
    $ai = $_POST['ai'];
    $py = $_POST['py'];
    /*if($ci == 0) $ci = null;
    if($ai == 0) $ai = null;*/

    if($ci == '' && $ai == ''){
        $query = "update book set book_name = '$bn', category_id = NULL , author_id=NULL , published_year = '$py' WHERE book_id = $bi";
    }else{
        if ($ci == ''){
            $query = "update book set book_name = '$bn', category_id=NULL, author_id = '$ai', published_year = '$py' WHERE book_id = $bi";
        }elseif ($ai == ''){
            $query = "update book set book_name = '$bn', category_id = '$ci', author_id=NULL, published_year = '$py' WHERE book_id = $bi";
        }else{
            $query = "update book set book_name = '$bn', category_id = '$ci', author_id = '$ai', published_year = '$py' WHERE book_id = $bi";
        }
    }

//    $query = "update book set book_name = '$bn', category_id = $ci, author_id = $ai, published_year = '$py' WHERE book_id = $bi";

    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
    echo "1 Record Update";
}
?>