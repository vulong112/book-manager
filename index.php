<?php
include 'config.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">


        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/myscript.js"></script>

        

<!--        <script>-->
<!--            $(document).ready(function () {-->
<!--                $('#author').click(function (e) {-->
<!--                    e.preventDefault();-->
<!--                    $.ajax({-->
<!--                        url: 'http://localhost/php-mysql/config.php',-->
<!--                        data:"",-->
<!--                        dataType: 'json',-->
<!--                        success: function (data) {-->
<!--                            var id=data[0];-->
<!--                            var name=data[1];-->
<!--                            $('#content').html("Category id" + id +" Category name" + name);-->
<!--                        }-->
<!--                    });-->
<!--                });-->
<!--            });-->
<!--        </script>-->
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div>
            <div class="col-md-12">

                    <h2 class="text-center">BOOKS MANAGER</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">FILTER
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#" id="book-menu">Book</a></li>
                                <li><a tabindex="-1" href="#" id="author-menu">Authors</a></li>
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Category <span class="caret"></span></a>
                                    <ul class="dropdown-menu category-menu">
                                        <?php
                                            $result = mysqli_query($con,"select * from category");
                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<li><a tabindex='-1' href='#' data-def='".$row['category_id']."'>".$row['category_name']."</a> </li>";
                                                }
                                            }else{
                                                echo "<li ><a tabindex='-1' href='#'>&nbsp;</a></li>";
                                            }
                                        ?>
                                        
                                        <!--<li><a tabindex="-1" href="#" data-def="301">Novel</a></li>
                                        <li><a tabindex="-1" href="#" data-def="300">Manga</a></li>
                                        <li><a tabindex="-1" href="#" data-def="302">Fiction</a></li>-->

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">MANAGER
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#" id="book-admin">Book</a></li>
                                <li><a tabindex="-1" href="#" id="author-admin">Authors</a></li>
                                <li><a class="test" tabindex="-1" href="#" id="category-admin">Category</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-9" id="right-content">
                    <div class="bookrecords-content">

                    </div>

<!--                Manager Books-->

<!--                Modal -- Add  new book-->
                    <div id="book-admin-content" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal_book">Add New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Record:</h3>
                                <div id="book-manager"></div>
                            </div>

                        </div>

                        <div class="modal fade" id="add_new_record_modal_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Record Book</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="book_id">Book ID</label>
                                            <input type="text" id="book_id" placeholder="Book ID" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                            <input type="text" id="book_name" placeholder="Book Name" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <!--<label for="category_id">Category ID</label>
                                            <input type="text" id="category_id" placeholder="Category ID" class="form-control"/>-->
                                            <label>Category Name</label>
                                            <select class="form-control" id="category_id">
                                                <?php
                                                    $sql = "select * from category";
                                                    $kq = mysqli_query($con, $sql);
                                                    if(!$kq){
                                                        exit(mysqli_error($con));
                                                    }else{
                                                        if(mysqli_num_rows($kq)>0){
                                                            echo "<option value=''>Null</option>";
                                                            while ($row = mysqli_fetch_assoc($kq)){
                                                                echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                                                            }
                                                        }else echo "<option>No Record</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label >Author Name</label>
<!--                                            <input type="text" id="author_id" placeholder="Author ID" class="form-control"/>-->
                                            <select class="form-control" id="author_id">
                                                <?php
                                                $sql = "select * from author";
                                                $kq = mysqli_query($con, $sql);
                                                if(!$kq){
                                                    exit(mysqli_error($con));
                                                }else{
                                                    if(mysqli_num_rows($kq)>0){
                                                        echo "<option value=''>Null</option>";
                                                        while ($row = mysqli_fetch_assoc($kq)){
                                                            echo "<option value='".$row['author_id']."'>".$row['fullname']."</option>";
                                                        }
                                                    }else echo "<option >No record</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="published_year">Published Year</label>
                                            <input type="text" id="published_year" placeholder="Published Year" class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" onclick="addRecordsBook()">Add Record</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

<!--                    End Modal add new book-->

<!--                    Modal -- Update book-->

                    <div class="modal fade" id="update-book-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="update-book-id">Book ID</label>
                                        <input type="text" id="update-book-id" placeholder="First Name" class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-book-name">Book Name</label>
                                        <input type="text" id="update-book-name" placeholder="Last Name" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <!--<label for="update-category-id">Category ID</label>
                                        <input type="text" id="update-category-id" placeholder="Email Address" class="form-control"/>-->
                                        <label>Category Name</label>
                                        <select class="form-control" id="update-category-id">
                                            <?php
                                            $sql = "select * from category";
                                            $kq = mysqli_query($con, $sql);
                                            if(!$kq){
                                                exit(mysqli_error($con));
                                            }else{
                                                if(mysqli_num_rows($kq)>0){
                                                    echo "<option value=''>Null</option>";
                                                    while ($row = mysqli_fetch_assoc($kq)){
                                                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                                                    }
                                                }else echo "<option></option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                       <!-- <label for="update-author-id">Author ID</label>
                                        <input type="text" id="update-author-id" placeholder="Email Address" class="form-control"/>-->
                                        <label >Author Name</label>
                                        <!--                                            <input type="text" id="author_id" placeholder="Author ID" class="form-control"/>-->
                                        <select class="form-control" id="update-author-id">
                                            <?php
                                            $sql = "select * from author";
                                            $kq = mysqli_query($con, $sql);
                                            if(!$kq){
                                                exit(mysqli_error($con));
                                            }else{
                                                if(mysqli_num_rows($kq)>0){
                                                    echo "<option value=''>Null</option>";
                                                    while ($row = mysqli_fetch_assoc($kq)){
                                                        echo "<option value='".$row['author_id']."'>".$row['fullname']."</option>";
                                                    }
                                                }else echo "<option></option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-published-year">Published Year</label>
                                        <input type="text" id="update-published-year" placeholder="Published Year" class="form-control"/>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="updateBookDetail()" >Save Changes</button>
                                    <input type="hidden" id="hidden-book-id">
                                </div>
                            </div>
                        </div>
                    </div>

<!--                    End -- Update book-->
<!--                    End Manager Book-->

<!--                    Manager Author-->
<!--                    Modal -- Add New Author-->
                    <div id="author-admin-content" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal_author">Add New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Record:</h3>
                                <div id="author-manager"></div>
                            </div>

                        </div>

                        <div class="modal fade" id="add_new_record_modal_author" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Record Author</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="add-author-id">Author ID <i style="color: red">*</i></label>
                                            <input type="text" id="add-author-id" placeholder="Author ID" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-full-name">Full Name <i style="color: red">*</i></label>
                                            <input type="text" id="add-full-name" placeholder="Full Name" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-email">Email <i style="color: red">*</i></label>
                                            <input type="email" id="add-email" placeholder="Email" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-phone-number">Phone Number</label>
                                            <input type="number" id="add-phone-number" placeholder="Phone Number" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-birthday">Birthday</label>
                                            <input type="date" id="add-birthday" placeholder="YYYY-MM-DD" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="add-address">Address</label>
                                            <input type="text" id="add-address" placeholder="Address" class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" onclick="addRecordsAuthor()">Add Record</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
<!--                    End Modal -- New Author-->

<!--                    Modal -- Update author-->

                    <div class="modal fade" id="update-author-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="update-full-name">Full Name</label>
                                        <input type="text" id="update-full-name" placeholder="Full Name" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-email">Email</label>
                                        <input type="text" id="update-email" placeholder="Email" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-phone-number">Phone Number</label>
                                        <input type="text" id="update-phone-number" placeholder="Phone Number" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-birthday">Birthday</label>
                                        <input type="text" id="update-birthday" placeholder="YYYY-MM-DD" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="update-address">Address</label>
                                        <input type="text" id="update-address" placeholder="Address" class="form-control"/>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="updateAuthorDetail()" >Save Changes</button>
                                    <input type="hidden" id="hidden-author-id">
                                </div>
                            </div>
                        </div>
                    </div>


<!--                    End Modal -- Update author-->

<!--                    End Manager Author-->

<!--                    Manager Category-->

<!--                    Modal -- Add new category-->

                    <div id="category-admin-content" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal_category">Add New Record</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Record:</h3>
                                <div id="category-manager"></div>
                            </div>

                        </div>

                        <div class="modal fade" id="add_new_record_modal_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Record Author</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="category-id">Category ID</label>
                                            <input type="text" id="category-id" placeholder="Category ID" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="category-name">Category Name</label>
                                            <input type="text" id="category-name" placeholder="Category Name" class="form-control"/>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


<!--                    End Modal -- Add new category-->
<!--                    Modal -- Update Category-->

                    <div class="modal fade" id="update-category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="update-category-name">Category Name</label>
                                        <input type="text" id="update-category-name" placeholder="Category Name" class="form-control"/>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="" >Save Changes</button>
                                    <input type="hidden" id="hidden-category-id">
                                </div>
                            </div>
                        </div>
                    </div>


<!--                    End Modal -- Update Category-->


<!--                    End Manager Category-->
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php

?>