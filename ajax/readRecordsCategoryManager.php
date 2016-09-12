<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 11/07/2016
 * Time: 9:00 CH
 */

include "../config.php";




$bookrecords = '<table class="table table-bordered table-striped">
						<tr>
							<th>Category Id</th>
							<th>Category Name</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

$query = "select * from category";
$result = mysqli_query($con,$query);
if(!$result){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $bookrecords .= "<tr>
                            <td>".$row['category_id']."</td>
                            <td>".$row['category_name']."</td>
                            <td>
                                <button onClick='' class='btn btn-warning'>Update</button>
                            </td>
                            
                            <td>
                                <button class='btn btn-danger'>Delete</button>
                            </td>
                            
                        </tr>";
    }
}else{
    $bookrecords .= '<tr><td colspan="4">Record not found</td></tr>';
}

$bookrecords .= '</table>';

echo $bookrecords;
