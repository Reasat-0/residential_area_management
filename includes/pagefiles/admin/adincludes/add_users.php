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
        input[type=email],
        input[type=password],
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
    <h2 style="color:white; font-size:300%; text-align:center float: right;">
        Add Users Here
    </h2>

    <?php
    if(isset($_POST['adduser']))
    {       
            /*$house_cat_id = $_POST['catagory_selection'];*/
            $user_name =$_POST['username'];
            
            $user_img =$_FILES['userimg']['name'];
            $tmp_name  =$_FILES['userimg']['tmp_name'];
                
                move_uploaded_file($tmp_name,"../images/$user_img");
                
            $user_type =$_POST['user_type_selection'];
            $user_email =$_POST['useremail'];
            $user_password =$_POST['userpassword'];
            $fname =$_POST['fname'];
            $lname =$_POST['lname'];
            /*$house_date = date('d-m-y');*/
            $user_status ='Admin';
            /*$add_house =$_POST['addhouse'];*/
            /*$house_comment_count = '1';*/
        
            $user_insert ="INSERT INTO user(username,userimg,type,useremail,userpassword,fname,lname,userstatus) ";
        $user_insert.="VALUES('{$user_name}','{$user_img}','{$user_type}','{$user_email}','{$user_password}','{$fname}','{$lname}','{$user_status}') ";
        
            $add_user_query = mysqli_query($connection,$user_insert);
            if(!$add_user_query)
                die("Not done".mysqli_error($connection));
    }
    
    ?>
    <h2 style="font-size: 60px; color: #1c232c; margin-left: 30%;">
        Add Users Here
    </h2>
    <div class="form">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="inputs">
                <label for="">User Name</label>
                <input type="text" name="username">
            </div>
            <div class="inputs">
                <label for="">Image</label> <br>
                <input type="file" name="userimg">
            </div>
            <div class="inputs">
               <label for="">Choose Status</label> <br>
                <select name="user_type_selection" id="" >
<?php
                   /* $select_cat_query = "SELECT * FROM catagories";
                    $selected = mysqli_query($connection,$select_cat_query);
                       
                       
                        while($row = mysqli_fetch_assoc($selected))
                 {
                     $cat_id    = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                            
                    echo "<option value='{$cat_id}'>$cat_title</option>";
                    
                        }*/
?>                
?>   
                 
                <option value="Subscriber">Subscriber</option>
                  <option value="Admin">Admin</option>  
                </select>
            </div>
            
            <div class="inputs">
                <label for="">Email</label> <br>
                <input type="email" name="useremail">
            </div>
            <div class="inputs">
                <label for="">Password</label>
                <input type="password" name="userpassword">
            </div>
            <div class="inputs">
                <label for="">First name</label>
                <input type="text" name="fname">
            </div>
            <!--<div class="inputs">
                <label for="">House date</label>
                <input type="date" name="date">
            </div>-->
            <div class="inputs">
                <label for="">Last name</label>
                <input type="text" name="lname">
            </div> <br>
            <div class="inputs">
                <input type="submit" name="adduser" value="Sign up">
            </div>
            
        </form>

        </div>

</body>

</html>
