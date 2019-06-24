   

<style>
        .catfield label {
            font-size: 20px;
        }

        input[type=text] {
            width: 90%;
            height: 30px;
            border: 3px solid rgba(0, 41, 54, 0.59);
            font-size: 15px;
        }

        input[type=submit] {
            margin: 2% 0;
            width: 30%;
            height: 35spx;
            font-size: 20px;
            border: 4px solid rgba(0, 41, 54, 0.59);
            border-radius: 10%;

        }
        .form_section {
            float: left;
            width: 50%;
        }

</style>
    

    
    
    <div class="form_section">

    <br>
    <br>
    <br>
    <br>
    


        <?php
        
        //////////////// UPDATION FORM VISIBLITY ////////////////////////
                             
                             if(isset($_GET['update']))
                             {
                                 $up_cat_id = $_GET['update'];
                                 $select_query    = "SELECT * FROM catagories WHERE cat_id = {$up_cat_id}";
                                 $selected   = mysqli_query($connection, $select_query);
                                 
                                 while($row = mysqli_fetch_assoc($selected))
                                     {
                                         $cat_id =$row['cat_id'];
                                         $cat_title =$row['cat_title'];
                                 }
                        ?>


            <?php 
                             }
                             
                    ?>
        <form action="" method="post">
            <div class="catfield">

                <label for="catfield">Catagory Name : </label>

                <input type='text' name='catName' value='<?php if(isset($cat_title)){ echo $cat_title;}?>'>
                <div class="catsubmit">
                    <input type="submit" value="update" name="update">
                </div>
             <?php 
                //////////////Updating Catagories///////////////
                
            if(isset($_POST['update']))
            {
                $catName  = $_POST['catName'];
                $query    = "UPDATE catagories SET cat_title ='{$catName}' WHERE cat_id={$up_cat_id}";
                $updating = mysqli_query($connection, $query);
                header('Location:catagories.php');
            }
                
                
              
            ?> 
                
                
            </div>





    </form>
</div>
