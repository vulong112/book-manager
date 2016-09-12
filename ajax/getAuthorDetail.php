<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 11/07/2016
 * Time: 2:06 CH
 */


include '../config.php';

if(isset($_POST['id']) && isset($_POST['id']) != ''){
    $author_id = $_POST['id'];
    $query = "select * from author where author_id = '$author_id'";
    if(!$result = mysqli_query($con,$query)){
        exit(mysqli_error($con));
    }

    $response = array();
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
    }
    else{
        $response['status'] = 200;
        $response['message'] = 'Data not found';
    }
    echo json_encode($response);

}
else{
    $response['status'] = 200;
    $response['message'] = 'Invalid Request!';
}



?>