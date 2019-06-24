<?php
    include "db.php";
?>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .houseProfile {
            text-align: center;
            margin: 5vh auto;
            width: 80%;
        }

        .houseInfo h1,
        h2 {
            background-color: rgba(105, 105, 105, 0.47);
            border-radius: 10px;
            color: rgb(5, 33, 34);
            border: 4px solid rgba(0, 8, 8, 0.21);
        }

        label {
            font-size: 35px;
            font-weight: bold;
        }

        .h_name {
            background-color: rgb(9, 90, 93);
            color: white;
            border: 4px solid rgba(0, 8, 8, 0.21);
            border-radius: 10px;
        }

        .com {
            background-color: rgba(105, 105, 105, 0.47);
            color: white;
            border: 4px solid rgba(0, 8, 8, 0.21);
            border-radius: 10px;
        }

        button {
            padding: 10px 5%;
        }
        .authorName{
            padding: 10px 0;
        }
        .authorName img{
            height: 50px;
            width: 50px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
     cite{  
         font-size: 80%; 
         display: block;
         color: black;
   
}
        blockquote{
            padding: 1%;
            font-style: italic;
            line-height: 120%;
            color: black;
}
        
        

    </style>





    <?php 
        if(isset($_GET['h_id'])){
            $h_id = $_GET['h_id'];
            
            
        }


    $selectHouse = "SELECT * FROM house WHERE house_id = $h_id";
    $shquery = mysqli_query($connection,$selectHouse);
    
    while ($row = mysqli_fetch_assoc($shquery)){
        $h_name = $row['house_name'];
        $h_img = $row['house_img'];
        $h_ra = $row['ra_name'];
        $h_ad = $row['advance'];
        $h_rent = $row['house_rent'];
        $h_date = $row['date'];
        $h_cat_id =$row['house_cat_id'];
        
        
        
        /*-------------SELECT CATAGORIEs------------------------*/
        
        $select_cat = "SELECT * FROM catagories WHERE cat_id= $h_cat_id";
        $select_cat_query = mysqli_query($connection,$select_cat);
        
        while($row = mysqli_fetch_assoc($select_cat_query)){
            $catTitle = $row['cat_title'];
        
        
        
        
        
        ?>
    <div class="home-btn">
        <a href="../../index.php">HOME</a>
    </div>

    <div class="houseProfile">
        <img src="images/<?php echo $h_img; ?>" style="width: 100%; height: 45vh; border-radius: 20px; border: 4px solid rgba(0, 8, 8, 0.21);" alt="">

        <div class="houseInfo">
            <div class="h_name">
                <label for="">House Name</label>
            </div>
            <h1>
                <?php echo $h_name; ?>
            </h1>
            <div class="h_name">
                <label for="">Residential Area</label>
            </div>
            <h2>
                <?php echo $h_ra; ?>
            </h2>

            <div class="h_name">
                <label for="">House Rent</label>
            </div>
            <h2>
                <?php echo $h_rent; ?>
            </h2>
            <div class="h_name">
                <label for="">House Catagory</label>
            </div>
            <h2>
                <?php echo $catTitle; ?>
            </h2>
            <div class="h_name">
                <label for="">Put Comments</label>
            </div>
            <!--       
           
            ******************************************************************************************
              ---------------------------------COMMENT EXECUTION------------------------------------
            ******************************************************************************************  
              
              
              -->
            <?php
                if(isset($_POST['comment_submit'])){
                    $comment_author = $_POST['com_author'];
                    $comment_email = $_POST['com_email'];
                    $comment_content = $_POST['com_content'];
                    $house_comment_count = 0;
                    
                    /*$house_com_id = "Title"; */
                    $comment_status = "unapproved";
            
            $insert_com = "INSERT INTO comments(comment_house_id,comment_status,comment_author,comment_email,comment_content,date)";
            $insert_com .="VALUES('$h_id','$comment_status','$comment_author','$comment_email','$comment_content',now())";
                    
            $insert_com_query = mysqli_query($connection,$insert_com);
/*
*************************************************************************************************
---------------------------------------------UPDATING COMMENTS COUNTS---------------------------------------------------         ***********************************************************************************************************
*/


        $com_count_update = "UPDATE house SET house_comment_count = house_comment_count + 1 ";  
        $com_count_update .= "WHERE house_id = $h_id";
        $com_count_action = mysqli_query($connection,$com_count_update);
                    if(!$com_count_action){
                        die(mysqli_error($connection));
                    }
            
                    
                    
                }
            
            ?>


                <div class="com">
                    <form action="" method="POST">
                        <label for="author" style="color: black; font-size: 25px;">Comment Here</label> <br>
                        <textarea name="com_content" id="" cols="50" rows="16"></textarea> <br>
                        <label for="author" style="color: black; font-size: 25px;">Author name</label> <br>
                        <textarea name="com_author" id="" cols="50" rows="2"></textarea> <br>
                        <label for="author" style="color: black; font-size: 25px;">Author Email</label> <br>
                        <textarea name="com_email" id="" cols="50" rows="2"></textarea> <br>
                        <button class="h_name" name="comment_submit">Submit<!--</a>--></button>
                    </form>
                </div>


<!--**********************************************************************************************************************
---------------------------------------------SHOWING COMMENTS---------------------------------------------------         ************************************************************************************************************************ -->


                <?php   
            $show_com = "SELECT * FROM comments WHERE comment_house_id = {$h_id} ";
            $show_com .= "AND comment_status= 'approved' ";
            $show_com .= "ORDER BY comment_id DESC ";
            $show_com_query = mysqli_query($connection,$show_com);
            if(!$show_com_query){
                die("Failed".mysqli_error());
            }
            while($com_row = mysqli_fetch_assoc($show_com_query)){
                $com_author = $com_row['comment_author'];
                $com_content = $com_row['comment_content'];
               
?>
                <div class="com">
                    
                    <div class="content">
                        <blockquote>
                               <?php
                                 echo $com_content;
?> 
                        </blockquote>
                            
                    </div>
                    <div class="authorName">
                           <cite class="usercom">
                               <img src="../image/3.jpg" alt="">
                               <?php
                               echo $com_author;
                                ?>
                           </cite>

                    </div>
                </div>
                <?php
            }
                
?>

        </div>
    </div>

    <?php       
            }
        
    }



?>
