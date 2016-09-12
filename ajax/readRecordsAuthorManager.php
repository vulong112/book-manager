<?php
/**
 * Created by PhpStorm.
 * User: vulong
 * Date: 10/07/2016
 * Time: 12:33 CH
 */

include "../config.php";
$aurecords = '<table class="table table-bordered table-striped">
                    <tr>
                        <th>Author Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>';
$query = "select * from author";
$result = mysqli_query($con,$query);
if(!$result){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $aurecords .= "<tr><td>".$row['author_id']."</td>
                                <td>".$row['fullname']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phonenumber']."</td>
                                <td>".$row['birthday']."</td>
                                <td>".$row['address']."</td>
                                <td>
                                    <button onClick='getAuthorDetail(".$row['author_id'].")' class='btn btn-warning'>Update</button>
                                </td>
                            
                                <td>
                                    <button onClick='deleteRecordsAuthor(".$row['author_id'].")' class='btn btn-danger'>Delete</button>
                                </td>
                           </tr>";
    }
}else{
    $aurecords .= "<tr><td colspan='8'>Record not found</td></tr>";
}

$aurecords .= '</table>';
echo $aurecords;

?>