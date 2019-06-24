<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
<!-- 	<link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/css/icon.css">-->
	<link href="https://unpkg.com/ionicons@4.1.1/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="includes/css/style.css">
	<link rel="stylesheet" href="includes/css/responsive.css">
	<title>Be residential</title>
</head>
<body>
    <?php
//        include "includes/db.php";
    ?>
	<?php
        include "includes/pagefiles/header.php";
    ?>

	<?php
        include "includes/pagefiles/feature_section.php";
    ?>

    <?php
        include "includes/pagefiles/new.php";
    ?>
	
	 <?php
        include "includes/pagefiles/how_it_works.php";
    ?>
	
	<?php
        include "includes/pagefiles/cities.php";
    ?>
    
    <?php
        include "includes/pagefiles/cust_opt.php";
    ?>
            
            
            <section class="sign-up" id="sign_up">
                <div class="row">
                    <h2>Sign &mdash; Up Here</h2>
                </div>
                <form action="" class="form-edit">
                <div class="row">
                    <div class="form">
                        <div class="col span-1-of-3">
                            <label for="">Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" id="name" placeholder="name" required>
                        </div>
                    </div>
                </div>
             <div class="row">
                    <div class="form">
                        <div class="col span-1-of-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" id="email" placeholder="put email" required>
                        </div>
                    </div>
                </div>
             <div class="row">
                    <div class="form">
                        <div class="col span-1-of-3">
                            <label for="Password">Password</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" id="pass" placeholder="email" required>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="form">
                        <div class="col span-1-of-3">
                            <label for="">Where did u find us</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="" id="">
                                <option value="">facebook</option>
                                <option value="">friends</option>
                                <option value="">Instagram</option>
                                <option value="">Search Engine</option>
                            </select>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-3">
                            <label for="Messeage">Message</label>
                        </div>
                    <div class="col span-2-of-3">
                        <textarea name="" id="" cols="30" rows="10">
                        </textarea>
                    </div>
                </div>
                 <div class="row">
                    <div class="col span-1-of-3">
                            <label for="Messeage"> &nbsp;</label>
                        </div>
                    <div class="col span-2-of-3"> 
                        <input type="submit" value="Sign up">
                    </div>
                </div>
                </form>        
                </section>
                
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond@0.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="includes/javas.js"></script>
    
</body>
    
</html>


