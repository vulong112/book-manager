<?php
include '../config.php';

$bookrecords = '<table class="table table-bordered table-striped">
						<tr>
							<th>book_id</th>
							<th>book_name</th>
							<th>category_id</th>
							<th>author_id</th>
							<th>pulished_year</th>
						</tr>';

$query = "select * from book";

if(!$result = mysqli_query($con,$query)){
    exit(mysqli_error($con));
}

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $bookrecords .= '<tr>
                            <td>'.$row['book_id'].'</td>
                            <td>'.$row['book_name'].'</td>
                            <td>'.$row['category_id'].'</td>
                            <td>'.$row['author_id'].'</td>
                            <td>'.$row['published_year'].'</td>
                        </tr>';
    }
}else{
    $bookrecords .= '<tr colspan="5">Record not found</tr>';
}

$bookrecords .= '</table';

echo $bookrecords;
?>