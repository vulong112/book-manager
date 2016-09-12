<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 12/07/2016
 * Time: 1:59 CH
 */

include "../config.php";

if(isset($_POST['book_id']) && isset($_POST['book_name']) && isset($_POST['category_id']) && isset($_POST['author_id']) && isset($_POST['published_year'])){
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    $published_year = $_POST['published_year'];

//    die(var_dump($category_id));
    /*if($category_id == '') $category_id = null;

    if($author_id == '') $author_id = null;*/
    if($category_id == '' && $author_id == ''){
        $query = "INSERT INTO book(book_id,book_name,published_year) VALUE ('$book_id', '$book_name','$published_year')";
    }else{
        if ($category_id == ''){
            $query = "INSERT INTO book(book_id,book_name, author_id, published_year) VALUE ('$book_id', '$book_name', '$author_id', '$published_year')";
        }elseif($author_id == ''){
            $query = "INSERT INTO book(book_id,book_name, category_id, published_year) VALUE ('$book_id', '$book_name', '$category_id', '$published_year')";
        }else{
            $query = "INSERT INTO book(book_id,book_name, category_id, author_id, published_year) VALUE ('$book_id', '$book_name', '$category_id', '$author_id', '$published_year')";
        }
    }

//    $query = "INSERT INTO book(book_id,book_name,published_year) VALUE ('$book_id', '$book_name','$published_year')";
    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }
    echo "1 Record Add";
}

?>

