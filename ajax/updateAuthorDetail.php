<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 14/07/2016
 * Time: 9:03 SA
 */

include "../config.php";

if(isset($_POST)){
    $ai = $_POST['ai'];
    $fn = $_POST['fn'];
    $em = $_POST['em'];
    $pn = $_POST['pn'];
    $bd = $_POST['bd'];
    $ad = $_POST['ad'];
    /*if($ci == 0) $ci = null;
    if($ai == 0) $ai = null;*/
    $query = "UPDATE author SET fullname = '$fn', email = '$em', phonenumber = '$pn', birthday = '$bd', address = '$ad' WHERE author_id = '$ai'";

    /*if($ci == '' && $ai == ''){
        $query = "update book set book_name = '$bn', category_id = NULL , author_id=NULL , published_year = '$py' WHERE book_id = $bi";
    }else{
        if ($ci == ''){
            $query = "update book set book_name = '$bn', category_id=NULL, author_id = '$ai', published_year = '$py' WHERE book_id = $bi";
        }elseif ($ai == ''){
            $query = "update book set book_name = '$bn', category_id = '$ci', author_id=NULL, published_year = '$py' WHERE book_id = $bi";
        }else{
            $query = "update book set book_name = '$bn', category_id = '$ci', author_id = '$ai', published_year = '$py' WHERE book_id = $bi";
        }
    }*/

//    $query = "update book set book_name = '$bn', category_id = $ci, author_id = $ai, published_year = '$py' WHERE book_id = $bi";

    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
    echo "1 Record Update";
}
?>