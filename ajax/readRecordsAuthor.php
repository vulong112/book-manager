<?php
    include "../config.php";
    $aurecords = '<table class="table table-bordered table-striped">
                    <tr>
                        <th>author_id</th>
                        <th>fullname</th>
                        <th>email</th>
                        <th>phonenumber</th>
                        <th>birthday</th>
                        <th>address</th>
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
                           </tr>";
        }
    }else{
        $aurecords .= "<tr><td colspan='6'>Record not found</td></tr>";
    }

    $aurecords .= '</table>';
    echo $aurecords;

?>