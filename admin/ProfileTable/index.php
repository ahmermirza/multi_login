<?php
//database conection  file
include('dbconnection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $profilepic = $_GET['ppic'];
    $ppicpath = "profilepics" . "/" . $profilepic;
    $sql = mysqli_query($con, "delete from users where ID=$rid");
    unlink($ppicpath);
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Elegant Table Design</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            font-size: 15px;
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-height: 45px;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title select {
            border-color: #ddd;
            border-width: 0 0 1px 0;
            padding: 3px 10px 3px 5px;
            margin: 0 5px;
        }

        .table-title .show-entries {
            margin-top: 7px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box .input-group {
            min-width: 200px;
            position: absolute;
            right: 0;
        }

        .search-box .input-group-addon,
        .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }

        .search-box .input-group-addon {
            border: none;
            border: none;
            background: transparent;
            position: absolute;
            z-index: 9;
        }

        .search-box input {
            height: 34px;
            padding-left: 28px;
            box-shadow: none !important;
            border-width: 0 0 1px 0;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 8px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
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
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            padding: 0 10px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
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
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container-xl px-0">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Profile <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7" align="right">
                            <a href="insert.php" class="btn btn-secondary"><i class="fa-solid fa-circle-plus pr-2"></i>Add New User</a>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Profile Pic</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Salary</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from users");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <!-- <td><?php echo $cnt; ?></td> -->
                                    <td class="align-middle py-2"><img src="<?php echo 'profilepics/'.$row['profile_pic']; ?>" width="80" height="80"></td>
                                    <td class="align-middle py-2"><?php echo $row['username']; ?></td>
                                    <td class="align-middle py-2"><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                    <td class="align-middle py-2"><?php echo $row['email']; ?></td>
                                    <td class="align-middle py-2"> <?php echo $row['address'].', '.$row['post_nr'].', '.$row['country']; ?></td>
                                    <td class="align-middle py-2"><?php echo $row['phone']; ?></td>
                                    <td class="align-middle py-2"><?php echo $row['salary']; ?></td>
                                    <td class="align-middle py-2"><?php echo $row['user_type']; ?></td>
                                    <td class="align-middle py-2">
                                        <a href="read.php?viewid=<?php echo htmlentities($row['id']); ?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="edit.php?editid=<?php echo htmlentities($row['id']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <!-- <a href="index.php?delid=<?php echo ($row['id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a> -->
                                        <a href="index.php?delid=<?php echo ($row['id']); ?>&&ppic=<?php echo $row['profile_pic']; ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>