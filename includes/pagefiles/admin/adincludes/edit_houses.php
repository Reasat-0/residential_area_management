<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <style>
        h1 {
            display: none;
        }
        
        input[type=text],
        input[type=date],
        input[type=file] {
            margin: 8px 0;
        }

        input[type=submit] {
            padding: 5px 0%;
            margin: 10px 27%;
        }
        /*
        input[type=file] {
            margin-left: 8%;
            width: auto;
        }

        input[type=date] {
            width: 20%;
        }*/
        .form{
            width: 50%;
            margin: 0 auto;
            font-size: 120%;
            color: #182727;
        }
    </style>
</head>

<body>
    <h2 style="color:white; font-size:300%; text-align:center">
        Edit Houses Here
    </h2>



   
<?php
        if(isset($_GET['h_id'])){
            $h_id = $_GET['h_id'];
            /*echo $h_id;*/
       $select_home = "SELECT * FROM house WHERE house_id={$h_id}";
       $select_home_query = mysqli_query($connection,$select_home);
       while($row = mysqli_fetch_assoc($select_home_query)){


           $house_id = $row['house_id'];
           $house_name = $row['house_name'];
           $house_img = $row['house_img'];
           $house_rent = $row['house_rent'];
           $house_adv = $row['advance'];
           $house_ra = $row['ra_name'];
           $house_tag = $row['house_tags'];
           $house_status = $row['house_status'];
           
           /*echo "<td>{$house_id}</td>
            <td>{$house_name}</td>
            <td><img src='../images/{$house_img}' style ='height: 50px'></td>
            <td>{$house_rent}</td>
            <td>{$house_adv}</td>
            <td>{$house_ra}</td>
            </tr>";*/
        }
        }
        
?>
    <div class="form">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="inputs">
                <label for="">House Name</label>
                <input type="text" name="housename" value="<?php echo $house_name; ?>" >
            </div>
            <div class="inputs">
                <img src="../images/<?php echo $house_img ?>" name="houseimage" alt="" style="width: 100px;">
                <input type="file" name="houseimg2">
            </div>
            <div class="inputs">
                <label for="">House Rent</label>
                <input type="text" name="houserent" value="<?php echo $house_rent; ?>">
            </div>
            <div class="inputs">
                <select name="catagory_selection" id="" style="margin: 5px 0px;">
<?php
                    $select_cat_query = "SELECT * FROM catagories";
                    $selected = mysqli_query($connection,$select_cat_query);
                       
                       
                        while($row = mysqli_fetch_assoc($selected))
                 {
                     $cat_id    = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                            
                    echo "<option value=''>$cat_title</option>";
                    
                        }
?>
                    
                </select>
            </div>
            
            <div class="input">
                <select name="house_status" id="" style="margin: 5px 0px;">
                    <option value="<?php echo "$house_status" ?>"><?php echo "$house_status" ?></option>
                    
                <?php 
                        if($house_status == 'draft')
                        {
                            echo "<option value='published'>published</option>";
                        }
                        
                        else 
                            echo "<option value='draft'>draft</option>";
    
    
                ?>
                </select>
            </div>
            
            <div class="inputs">
                <label for="">House advance</label>
                <input type="text" name="houseadvance" value="<?php echo $house_adv; ?>">
            </div>
            <div class="inputs">
                <label for="">House r/a</label>
                <input type="text" name="housera" value="<?php echo $house_ra; ?>">
            </div>
            <!--<div class="inputs">
                <label for="">House date</label>
                <input type="date" name="date">
            </div>-->
            <div class="inputs">
                <label for="">House tag</label>
                <input type="text" name="housetags" value="<?php echo $house_tag; ?>">
            </div>
            <div class="inputs">
                <input type="submit" name="edithouse" value="EDIT HOUSE">
            </div>
        </form>

        </div>
<?php
        if(isset($_POST['edithouse'])){
            
           /*$house_id = $_POST['house_id'];*/
           $house_name = $_POST['housename'];
           $house_img = $_FILES['houseimg2']['name'];
           $temp_name = $_FILES['houseimg2']['tmp_name'];
           $house_rent = $_POST['houserent'];
           $house_adv = $_POST['houseadvance'];
           $house_ra = $_POST['housera'];
           $house_status =$_POST['house_status'];
            
            move_uploaded_file($temp_name,"../images/$house_img");
            if(empty($house_img)){
                $select_image = "SELECT * FROM house WHERE house_id = {$h_id}";
                $selectImageQuery = mysqli_query($connection, $select_image);
                while($row = mysqli_fetch_assoc($selectImageQuery)){
                    $house_img = $row['house_img'];
                }
                
                confirm_Query($selectImageQuery);
                
            }

                /*$catName  = $_POST['catName'];
                $query    = "UPDATE house SET cat_title ='{$catName}' WHERE cat_id={$up_cat_id}";
                $updating = mysqli_query($connection, $query);
                header('Location:catagories.php');*/
            $edit_house_query = "UPDATE house SET ";
            $edit_house_query.= "house_name='{$house_name}', ";
            $edit_house_query.= "house_img='{$house_img}', ";
            $edit_house_query.= "date=now(), ";
            $edit_house_query.= "house_rent='{$house_rent}', ";
            $edit_house_query.= "advance='{$house_adv}', ";
            $edit_house_query.= "ra_name='{$house_ra}', ";
            $edit_house_query.= "house_status='{$house_status}' ";
            $edit_house_query.= "WHERE house_id={$house_id} ";
            
            $edit_action = mysqli_query($connection , $edit_house_query);
            
            confirm_Query($edit_action);
            if(!$edit_action){
            }
            else
                
                echo "<a href='../house_profile.php?h_id={$house_id}'>View House </a>";
                echo "<p> or <p> <a href='posts.php'> View all houses </a> ";
            
            
        }  
    
    
?>

</body>

</html>












