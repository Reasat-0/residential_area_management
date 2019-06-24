<style>
    .photobox{
        text-align: center;
    }
    .heads_houses{
       color: white;
       text-align: center;
       background-color: #134635;
       margin: 0px;
       
    }
    /*.photo_box h3{
       color: white;
       text-align: center;
       background-color: #134635;
       padding-bottom: 15px;
       margin: 0px;
    }*/

</style>
	

		
	<section class="new">
		<ul class="new_photos clear">
		<?php
                $select = "SELECT * FROM house";
                $query = mysqli_query($connection,$select);
                while($row = mysqli_fetch_assoc($query)){
                    $houseName = $row['house_name'];
                    $houseImg  = $row['house_img'];
                    $houseCat  = $row['house_cat_id'];
                    $house_id = $row['house_id'];
/*-------------------**********-----------------------********************************
*************************************Showig Cat Name*********************************
----***********************************************************--------------------*/
                    
                    
                    
                  $select_cat = "SELECT * FROM catagories WHERE cat_id = {$houseCat}";
                  $query_cat= mysqli_query($connection, $select_cat);
                    while($row_cat= mysqli_fetch_assoc($query_cat)){
                        $catTitle = $row_cat['cat_title'];
                        
                    } 
                    
                    
?>      
        <li>
        <a href="includes/pagefiles/house_profile.php?h_id=<?php echo $house_id; ?>"> 
               
        <figure class="photo_box">
            <img src="includes/pagefiles/images/<?php echo $houseImg; ?>"> 
        
        <h3 class="heads_houses"><?php echo $houseName; ?></h3>
        <h4 class="heads_houses"><?php echo $catTitle; ?></h4>
        
        </figure></li>   
		
       </a>
        
<?php
                        
      }
            
?>
        </ul>

		
	</section>