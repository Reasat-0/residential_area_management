<?php include "../db.php";  ?>
<?php include "functions.php";  ?>

<?php ob_start(); ?>
<?php session_start(); ?>


<!--

Filtering to log in by checking User STATUS

-->


<?php
    
    if(!isset($_SESSION['utype'])){
        
        
        header('Location: ../../../index.php');
        
    }
    
    else
    {
        if($_SESSION['utype'] !== 'Admin' )
        {
            header('Location: ../../../index.php');
        }
    }


?>

<!DOCTYPE html>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="admin_design.css">
    <link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          
    <style>
        .head-left a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="head">
        <div class="head-left">
            <a href="admin.php"><h1>Admin Panel</h1> </a>
        </div>
        <div class="head-right">
            <div class="navbar" id="nav">
                <a href="../../../index.php"><i class="icon ion-md-home"></i> Home</a>
                <div class="dropdown">
                    <button class="dropbtn"><i class="icon ion-md-person"></i>
                    User
                    </button>
                    <div class="dropdown-content">
                        <a href="#">profile</a>
                        <a href="../../logout.php">log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




<!--

FOR DASSHBOARD

-->




