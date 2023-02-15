<?php 
    include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Core Crud</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <style>
                body {
                    color: #566787;
                    background: #f5f5f5;
                    font-family: 'Roboto', sans-serif;
                }
                .table-responsive {
                    margin: 30px 0;
                }
                .table-wrapper {
                    min-width: 1000px;
                    background: #fff;
                    padding: 20px;
                    box-shadow: 0 1px 1px rgba(0,0,0,.05);
                }
                .table-title {
                    padding-bottom: 10px;
                    margin: 0 0 10px;
                    min-width: 100%;
                }
                .table-title h2 {
                    margin: 8px 0 0;
                    font-size: 22px;
                }
                .search-box {
                    position: relative;        
                    float: right;
                }
                .search-box input {
                    height: 34px;
                    border-radius: 20px;
                    padding-left: 35px;
                    border-color: #ddd;
                    box-shadow: none;
                }
                .search-box input:focus {
                    border-color: #3FBAE4;
                }
                .search-box i {
                    color: #a0a5b1;
                    position: absolute;
                    font-size: 19px;
                    top: 8px;
                    left: 10px;
                }
                table.table tr th, table.table tr td {
                    border-color: #e9e9e9;
                }
                table.table-striped tbody tr:nth-of-type(odd) {
                    background-color: #fcfcfc;
                }
                table.table-striped.table-hover tbody tr:hover {
                    background: #f5f5f5;
                }
                table.table th i {
                    font-size: 13px;
                    margin: 0 5px;
                    cursor: pointer;
                }
                table.table td:last-child {
                    width: 130px;
                }
                table.table td a {
                    color: #a0a5b1;
                    display: inline-block;
                    margin: 0 5px;
                }
                table.table td a.view {
                    color: #03A9F4;
                }
                table.table td a.edit {
                    color: #FFC107;
                }
                table.table td a.delete {
                    color: #E34724;
                }
                table.table td i {
                    font-size: 19px;
                }    
                .pagination {
                    float: right;
                    margin: 0 0 5px;
                }
                .pagination li a {
                    border: none;
                    font-size: 95%;
                    width: 30px;
                    height: 30px;
                    color: #999;
                    margin: 0 2px;
                    line-height: 30px;
                    border-radius: 30px !important;
                    text-align: center;
                    padding: 0;
                }
                .pagination li a:hover {
                    color: #666;
                }	
                .pagination li.active a {
                    background: #03A9F4;
                }
                .pagination li.active a:hover {        
                    background: #0397d6;
                }
                .pagination li.disabled i {
                    color: #ccc;
                }
                .pagination li i {
                    font-size: 16px;
                    padding-top: 6px
                }
                .hint-text {
                    float: left;
                    margin-top: 6px;
                    font-size: 95%;
                }    
            </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2> Details
                                    <b>List</b> 
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Add New Details </button>
                                </h2>
                            </div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Sr.no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // $select_query = " SELECT * FROM details"; // jb humko hard delete krna hai to usk liye hai 

                                // aur ye soft delete k liye hai 
                                $select_query = " SELECT * FROM details where deleted_at  IS NULL";

                                $query = mysqli_query($conn ,$select_query);
                                if(mysqli_num_rows($query) > 0)
                                { ?>
                                    <?php
                                        $srno = 1;
                                        while($rows = mysqli_fetch_assoc($query))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $srno++ ?></td>
                                                <td><?php echo $rows['name']?></td>
                                                <td><?php echo $rows['email']?></td>
                                                <td><?php echo $rows['country_name']?></td>
                                                <td><?php echo $rows['state_name']?></td>
                                                <td><?php echo $rows['city_name']?></td>
                                                <td><?php echo $rows['contact']?></td>
                                                <td>
                                                    <img src="<?php echo $rows['image']?>" alt="" style="width:100px; height:auto;">
                                                </td>
                                                <td><?php echo $rows['created_at']?></td>
                                                
                                                <td>
                                                    <a href="#" class="view" title="View" data-toggle="modal" data-target="#viewModal<?php echo $rows['id'] ?>"><i class="material-icons">&#xE417;</i></a>
                                                    <a href="#" class="edit" title="Edit" data-toggle="modal" data-target="#editModal<?php echo $rows['id'] ?>"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="Delete_Add_Details_Controllers.php?id=<?php echo $rows["id"];?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            
                                            </tr>
                                             <!-- For AddModel -->
                                            <div id="addModal" class="modal fade " role="dialog">
                                                <div class="modal-dialog modal-lg ">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3>Add New Details</h3><hr>
                                                            <form action="Create_Add_Dtails_Controllers.php" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="name" class="col-form-label">Name:</label>
                                                                    <input type="text" name="name" class="form-control"  id="name" placeholder="Enter Your Name .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email" class="col-form-label">Email:</label>
                                                                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Email .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="country_name" class="col-form-label">Country Name:</label>
                                                                    <input type="text" name="country_name" class="form-control" id="country_name"placeholder="Enter Your Country Name .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="state_name" class="col-form-label">State Name:</label>
                                                                    <input type="text" name="state_name" class="form-control"  id="state_name"placeholder="Enter Your State Name .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="city_name" class="col-form-label">City Name:</label>
                                                                    <input type="text" name="city_name" class="form-control"  id="city_name"placeholder="Enter Your City Name .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contact" class="col-form-label">Contact:</label>
                                                                    <input type="text" name="contact" class="form-control" id="contact"placeholder="Enter Your Contact .">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Image" class="col-form-label">Image:</label>
                                                                    <input type="file" name="image" class="form-control"  id="image">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-info" name="submit">Add New Details</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- For Update(Model) -->
                                            <div id="editModal<?php echo $rows['id'] ?>" class="modal fade " role="dialog">
                                                <div class="modal-dialog modal-lg ">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3>Update Details</h3><hr>
                                                            <form action="Update_Add_Dtails_Controllers.php" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="name" class="col-form-label">Name:</label>
                                                                    <input type="hidden" name="id" class="form-control" value="<?php echo $rows['id']?>" id="id">
                                                                    <input type="text" name="name" class="form-control" value="<?php echo $rows['name']?>" id="name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email" class="col-form-label">Email:</label>
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $rows['email']?>" id="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="country_name" class="col-form-label">Country Name:</label>
                                                                    <input type="text" name="country_name" class="form-control" value="<?php echo $rows['country_name']?>" id="country_name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="state_name" class="col-form-label">State Name:</label>
                                                                    <input type="text" name="state_name" class="form-control" value="<?php echo $rows['state_name']?>" id="state_name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="city_name" class="col-form-label">City Name:</label>
                                                                    <input type="text" name="city_name" class="form-control" value="<?php echo $rows['city_name']?>" id="city_name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contact" class="col-form-label">Contact:</label>
                                                                    <input type="text" name="contact" class="form-control" value="<?php echo $rows['contact']?>" id="contact">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Image" class="col-form-label">Image:</label>
                                                                    <input type="file" name="image" class="form-control" value="<?php echo $rows['image']?>" id="image">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- For View(Model) -->
                                            <div id="viewModal<?php echo $rows['id'] ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3>View Details</h3><hr>
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['name']?>" id="recipient-name" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['email']?>" id="recipient-name"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Country Name:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['country_name']?>" id="recipient-name"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">State Name:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['state_name']?>" id="recipient-name"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">City Name:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['city_name']?>" id="recipient-name"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Contact:</label>
                                                                    <input type="text" class="form-control" value="<?php echo $rows['contact']?>" id="recipient-name"readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Image" class="col-form-label">Image:</label>
                                                                    <img src="<?php echo $rows['image']?>" alt="" style="width:100px; height:auto;"readonly>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>   
    </body>
</html>