<?php
    include "db.php";
?>
    

    
<header class="head-box">
	    <nav>
		<div class="row">
			<img src="includes/image/newlogo.png" class="logo">
			<img src="includes/image/download.jpg" class="another-logo">
			<ul class="main-nav">
				<!--<li><a href="">Home</a></li>
				<li><a href="">Buy</a></li>
				<li><a href="">Rent</a></li>
				<li><a href="#service_cities">Services</a></li>-->
				<?php
                    $select_cat_query = "SELECT * FROM catagories";
                    $select_cat= mysqli_query($connection,$select_cat_query);
                while ($row = mysqli_fetch_assoc($select_cat))
                {
                    $cat= $row['cat_title'];
                    $catId = $row['cat_id'];
                    
                    echo "<li><a href='includes/pagefiles/catagories.php?catagory_id={$catId}'>{$cat}</a></li>";
                }
                
                ?>
				<li><a href="#sign_up">Sign Up</a></li>
			</ul>
			<a class="mobile-nav-icon"><i class="icon ion-md-menu"></i></a>
		</div>
		</nav>
		
		<div class="fullhead">
				<h1>Welcome to Be Residential</h1>
					<div class="button">
					           <a class="btn btn1 js--buy" href="includes/pagefiles/houses.php"> Houses </a>	
					           <a class="btn btn2 js--rent" href="includes/pagefiles/admin/admin.php"> Rent </a>
					           <a class="btn btn1 js--rent" href="includes/loginform.php"> Log in </a>
                    </div>	
		</div>
	</header>