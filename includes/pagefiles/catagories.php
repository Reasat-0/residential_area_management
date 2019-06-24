<?php
    include "db.php";
?>
<!--
   ----------------------CSS PART----------------------  
-->
<style>
    .houses {
            float: left;
            width: 32%;
            text-align: center;
            border: 2px solid #0c6d66;
            padding: 20px 0px;
        }

        .house_head {
            font-size: 300%;
            color: #041129;
        }

        h2 {
            color: forestgreen;
        }



</style>
   
   
<?php
    
    if($_GET['catagory_id']){
        $catagoryId = $_GET['catagory_id'];
        
        $selectCatHouses = "SELECT * FROM house WHERE house_cat_id =$catagoryId";
        $selectCatHouses_query = mysqli_query($connection,$selectCatHouses);
        
        while( $row = mysqli_fetch_assoc($selectCatHouses_query))
    {
        $house_id =$row['house_id'];
        $house_name = $row['house_name'];
        $house_img = $row['house_img'];
        $house_rent = $row['house_rent'];
        $house_adv = $row['advance'];
        $date = $row['date'];
        $ra_name = $row['ra_name'];
            
?>
        <a href="house_profile.php?h_id=<?php echo $house_id; ?>">
                <div class="houses">
                    <img src="images/<?php echo $house_img ?>" style="height: 100px"> <br>
                    <h1 class="house_head">
                        <?php echo $house_name ?> </h1>
                    <h2>
                        <?php echo $ra_name ?>
                    </h2>
                </div>
            </a>
          
           
<?php
            
        }
        
        
    }
    
    


?>