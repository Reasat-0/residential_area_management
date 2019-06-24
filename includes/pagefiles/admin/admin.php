
<?php 
    include "adincludes/ad_header.php";
    include "adincludes/left_menu.php";
?> 
    <style>
        .box{
            
            float: left;
            width: 20%;
            text-align: center;
            border: 2px solid #0c6d66;
            padding: 20px 0px;
            font-size: 200%;
            
        }
        .box a{
            font-size: 20px;
            color: black;
            text-decoration: none;
        }
/*        .number{
            border: 2px solid black;
            border-radius: 50%;
        }*/
        #columnchart_material{
            margin-left: 17%;
            margin-top: 265px;
        }
        

    </style>
<!--******************fetching data for dashboard count****************************-->
<?php
    
    $select_comment = "SELECT * FROM comments";
    $select_comment_action = mysqli_query($connection,$select_comment);

    $comment_count = mysqli_num_rows($select_comment_action)
    


?>
   
      
            
<?php
    
    $select_house = "SELECT * FROM house";
    $select_house_action = mysqli_query($connection,$select_house);

    $house_count = mysqli_num_rows($select_house_action)
    


?>
<?php
    
    $select_cat = "SELECT * FROM catagories";
    $select_cat_action = mysqli_query($connection,$select_cat);

    $category_count = mysqli_num_rows($select_cat_action)
    


?>   
           
<?php
    
    $select_user = "SELECT * FROM user";
    $select_user_action = mysqli_query($connection,$select_user);

    $user_count = mysqli_num_rows($select_user_action)
    


?>   
    
<div class="rightMenu">
			<h1 style="color:white;font-size: 80px;">
			
			Welcome 
			
			<?php echo $_SESSION['fname'];  ?></h1>
			
			<div class="box-one box">
			    <i class="icon ion-md-chatboxes"></i> <br>
			   <span><?php echo $comment_count; ?></span> <br> 
               <span>Comments</span>
               <hr>
               <span><a href="comments.php">View Details</a></span> 
            </div>
			<div class="box-four box">
			    <i class="icon ion-md-folder"></i><br>
                <span class="number"><?php echo $house_count; ?></span> <br>
                <span>Housses</span>
                <hr>
               <span><a href="posts.php">View Details</a></span>
            </div>
			<div class="box-four box">
			    <i class="icon ion-md-list"></i><br>
               <span><?php echo $category_count; ?></span> <br>
                <span>Categories</span>
                <hr>
               <span><a href="catagories.php">View Details</a></span>
            </div>
			<div class="box-four box">
			    <i class="icon ion-md-people"></i><br>
                <span><?php echo $user_count; ?></span> <br>
                <span>User</span>
                <hr>
               <span><a href="users.php">View Details</a></span>
            </div>
            
            
            
            
            
            
            <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);
                
        

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Post', 'Count'],
                             
                            
        <?php 
        /*                    
                ********************Classifying Comments , Users to show on chart****************
          */
                /*
                            *******FOR Unapproved comments***********/
                            
                $select_comments = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                $select_comments_action = mysqli_query($connection,$select_comments);
                $unap_comments_count = mysqli_num_rows($select_comments_action);
                            
                $element_title = ['Comments','Unapproved Comments','Houses','Users','Categories'];
                $element_num = [$comment_count,$unap_comments_count,$house_count,$user_count,$category_count];
                
                
                for($i = 0 ; $i < 5 ; $i++){
                    echo "['{$element_title[$i]}'" . "," ."'{$element_num[$i]}'],";
                }
                
        ?>
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
            </script>
			
			
        <div id="columnchart_material" style="width: 80%; height: 500px;"></div>



			
</div>
          
                                    
     
<?php
    if(!$connection)
        echo "not connected";
?>

  
   
