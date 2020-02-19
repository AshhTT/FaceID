<?php 
include 'AdminFunc.php';
if (!isAdminLoggedIn()){
    $_SESSION['msg'] = "You must Log in First";
    header('location:../AdminLogin.php');
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Article</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./adminlogin.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <style>
        h2{
            color:black; 
            text-align: center; 
            padding-top: 10%;
        }.table2{
            padding-left:100px;
            padding-right:100px;
            padding-top:50px;
        }.table1{
            border:1px solid black;
            margin-left:auto;
            margin-right:auto;
        }th , td{
            padding:10px; 
            text-align:left;
        }
    </style>

</head>
<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="../index.php">FaceID</a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" style="position: fixed; margin-left: 400px;" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Dashboard.php">Dashboard</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="ManagePortal.php">Manage Portal</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="ViewInquiries.php">View Inquiries</a></li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Manage accounts</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="AddUser.php">Add New Account</a>
                                <a class="dropdown-item" href="ManageOfficials.php">Police,UCSC & JMOs</a>
                                <a class="dropdown-item" href="ManageRUsers.php">Registered Users</a>
                            </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="AdminFunc.php?logout='1'">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $id = $_POST['id'];
    $results = mysqli_query($link, "SELECT * FROM portal WHERE id='$id'"); 
    ?>

    <h2>Article</h2>
    <div class="table2 d-flex justify-content-center">
        <table class="table1 table-dark table-striped">
        
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <th width="300px">ID</th>
                <td ><?php echo $row['id'];?></td>
            </tr>
            <tr>
                <th  width="300px">Date</th>
                <td ><?php echo $row['date'];?></td>
            </tr>
            <tr>
                <th  width="300px">Article</th>
                <td rows="50" cols="100"><?php echo $row['article'];?></td>
            </tr>
            <tr>
                <th  width="300px"></th>
                <form method="post" action="EditArticle.php">
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                    <td ><button class="btn btn-secondary" name="update_Portal" type="submit">Edit </button></td>
                </form>
            </tr>
            
        <?php } ?>
        
        </table>
    </div>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/agency.js"></script>
</body>
</html>