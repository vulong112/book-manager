<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 10/07/2016
 * Time: 12:10 CH
 */

include "../config.php";




$bookrecords = '<table class="table table-bordered table-striped">
						<tr>
							<th>Book ID</th>
							<th>Book Name</th>
							<th>Category ID</th>
							<th>Author ID</th>
							<th>Published Year</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

$query = "select * from book";
$result = mysqli_query($con,$query);
if(!$result){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['category_id'] == ''){
            $row['category_id'] = 'Null';
        }
        if($row['author_id'] == ''){
            $row['author_id'] = 'Null';
        }
        $bookrecords .= "<tr>
                            <td>".$row['book_id']."</td>
                            <td>".$row['book_name']."</td>
                            <td>".$row['category_id']."</td>
                            <td>".$row['author_id']."</td>
                            <td>".$row['published_year']."</td>
                            
                            <td>
                                <button onClick='getBookDetail(".$row['book_id'].")' class='btn btn-warning'>Update</button>
                            </td>
                            
                            <td>
                                <button onClick='deleteRecordsBook(".$row['book_id'].")' class='btn btn-danger'>Delete</button>
                            </td>
                            
                        </tr>";
    }
}else{
    $bookrecords .= '<tr><td colspan="7">Record not found</td></tr>';
}

$bookrecords .= '</table>';

echo $bookrecords;


?>