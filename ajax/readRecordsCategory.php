<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 08/07/2016
 * Time: 4:19 CH
 */

include "../config.php";

if(isset($_GET['cate_id'])){
    $cate_id = $_GET['cate_id'];
}else{
    $cate_id = '';
}

$caterecords = '<table class="table table-bordered table-striped">
						<tr>
							<th>book_id</th>
							<th>book_name</th>
							<th>published_year</th>
							<th>category_id</th>
							<th>category_name</th>
						</tr>';

$query = "select book_id, book_name, published_year, book.category_id, category_name from book join category on book.category_id = category.category_id where category.category_id = $cate_id";
$result = mysqli_query($con,$query);
if(!$result){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $caterecords .= '<tr>
                            <td>'.$row['book_id'].'</td>
                            <td>'.$row['book_name'].'</td>
                            <td>'.$row['published_year'].'</td>
                            <td>'.$row['category_id'].'</td>
                            <td>'.$row['category_name'].'</td>
                            
                        </tr>';
    }
}else{
    $caterecords .= '<tr><td colspan="6">Record not found</td></tr>';
}

$caterecords .= '</table>';

echo $caterecords;

?>