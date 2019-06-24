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
        input[type=file],
        select{
            margin: 8px 0;
        }
        select {
            font-size: 80%;
            padding: 3px 0;
            border: 2px solid rgba(116, 106, 106, 0.65);
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
        Add Houses Here
    </h2>

    <?php
    if(isset($_POST['addhouse']))
    {       
            $house_cat_id = $_POST['catagory_selection'];
            $house_name =$_POST['housename'];
            
            $house_img =$_FILES['houseimg']['name'];
            $tmp_name  =$_FILES['houseimg']['tmp_name'];
                
                move_uploaded_file($tmp_name,"../images/$house_img");
                
            $house_rent =$_POST['houserent'];
            $house_advance =$_POST['houseadvance'];
            $house_ra =$_POST['housera'];
            $house_date = date('d-m-y');
            $house_tags =$_POST['housetags'];
            /*$add_house =$_POST['addhouse'];*/
            $house_comment_count = '1';
        
            $house_insert ="INSERT INTO house(house_cat_id,house_name,house_img,house_rent,advance,ra_name,date,house_tags,house_comment_count) ";
        $house_insert.="VALUES('{$house_cat_id}','{$house_name}','{$house_img}','{$house_rent}','{$house_advance}','{$house_ra}',now(),'{$house_tags}','{$house_comment_count}') ";
        
            $add_house_query = mysqli_query($connection,$house_insert);
            if(!$add_house_query)
                die("Not done".mysqli_error($connection));
    }
    
    ?>
    <div class="form">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="inputs">
                <label for="">House Name</label>
                <input type="text" name="housename">
            </div>
            <div class="inputs">
                <label for="">Image</label> <br>
                <input type="file" name="houseimg">
            </div>
            <div class="inputs">
               <label for="">Choose Catagory</label> <br>
                <select name="catagory_selection" id="" >
<?php
                    $select_cat_query = "SELECT * FROM catagories";
                    $selected = mysqli_query($connection,$select_cat_query);
                       
                       
                        while($row = mysqli_fetch_assoc($selected))
                 {
                     $cat_id    = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                            
                    echo "<option value='{$cat_id}'>$cat_title</option>";
                    
                        }
?>
                    
                </select>
            </div>
            <div class="inputs">
                <label for="">House Rent</label>
                <input type="text" name="houserent">
            </div>
            <div class="inputs">
                <label for="">House advance</label>
                <input type="text" name="houseadvance">
            </div>
            <div class="inputs">
                <label for="">House r/a</label>
                <input type="text" name="housera">
            </div>
            <!--<div class="inputs">
                <label for="">House date</label>
                <input type="date" name="date">
            </div>-->
            <div class="inputs">
                <label for="">House tag</label>
                <input type="text" name="housetags">
            </div>
            <div class="inputs">
                <input type="submit" name="addhouse" value="addhouse">
            </div>
        </form>

        </div>

</body>

</html>
