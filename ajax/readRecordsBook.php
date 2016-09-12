<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 08/07/2016
 * Time: 10:41 SA
 */
include "../config.php";




$bookrecords = '<table class="table table-bordered table-striped">
						<tr>
							<th>book_id</th>
							<th>book_name</th>
							<th>category_id</th>
							<th>published_year</th>
							<th>author_id</th>
							<th>fullname</th>
						</tr>';

$query = "select book_id, book_name, category_id, book.author_id, published_year, fullname from book join author on book.author_id = author.author_id";
$result = mysqli_query($con,$query);
if(!$result){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $bookrecords .= '<tr>
                            <td>'.$row['book_id'].'</td>
                            <td>'.$row['book_name'].'</td>
                            <td>'.$row['category_id'].'</td>
                            <td>'.$row['published_year'].'</td>
                            <td>'.$row['author_id'].'</td>
                            <td>'.$row['fullname'].'</td>
                        </tr>';
    }
}else{
    $bookrecords .= '<tr><td colspan="6">Record not found</td></tr>';
}

$bookrecords .= '</table>';

echo $bookrecords;
?>
