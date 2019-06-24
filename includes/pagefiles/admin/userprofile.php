<?php  include "adincludes/ad_header.php"; ?>
<?php  include "adincludes/left_menu.php"; ?>


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



<?php

    if(isset($_SESSION['userid'])){
        $sessionId = $_SESSION['userid'];
        
        $select = "SELECT * FROM user WHERE userid = '{$sessionId}'";
        $selected = mysqli_query($connection,$select);
        
        while($row = mysqli_fetch_assoc($selected)){
            
            $u_name = $row['username'];
            $u_img = $row['userimg'];
            $u_email = $row['useremail'];
            $u_fname = $row['fname'];
            $u_lname = $row['lname'];
            $u_type = $row['type'];
            $u_pass = $row['userpassword'];
            
        }
    }
       ?> 
        
    <h2 style="font-size: 60px; color: #1c232c; margin-left: 30%;">
        <?php echo $u_name ?> 's profile
    </h2>
    <div class="form">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="inputs">
                <label for="">User Name</label>
                <input type="text" name="username" value="<?php echo $u_name; ?>">
            </div>
            <div class="inputs">
                <label for="">Image</label> <br>
                <img src="../images/<?php echo $u_img; ?>" alt="" style="width: 50px;">
                <input type="file" name="userimg" value="">
            </div>
            <div class="inputs">
               <label for="">Choose Status</label> <br>
                <select name="user_type_selection" id="" >
                <?php
                    if($u_type == 'Admin'){
                ?>
                    
                    <option value="<?php echo $u_type; ?>"><?php echo $u_type; ?></option>
                 
                       <?php      
                  }  
                    else
                    { 
                        ?>
                        <option value="<?php echo $u_type; ?>"><?php echo $u_type; ?></option>
                    
                        <?php
                          }
                         
                ?>
                 <option value='Subscriber'>Subscriber</option>
                 
                <option value="Admin">Admin</option>
                
                </select>
            </div>
            
            <div class="inputs">
                <label for="">Email</label> <br>
                <input type="email" name="useremail" value="<?php echo $u_email; ?>">
            </div>
            <div class="inputs">
                <label for="">Password</label>
                <input type="password" name="userpassword" value="<?php echo $u_pass; ?>">
            </div>
            <div class="inputs">
                <label for="">First name</label>
                <input type="text" name="fname" value="<?php echo $u_fname; ?>">
            </div>
            <div class="inputs">
                <label for="">Last name</label>
                <input type="text" name="lname" value="<?php echo $u_lname; ?>">
            </div> <br>
            <div class="inputs">
                <input type="submit" name="updateuser" value="UPDATE">
            </div>
            
        </form>
        
<?php 
        if(isset($_POST['updateuser']))      
        {
            $username = $_POST['username'];
            
            $userimg = $_FILES['userimg']['name'];
            $tmpname = $_FILES['userimg']['tmp_name'];
            
            
            move_uploaded_file($tmpname,"../images/$userimg");
            if(empty($userimg)){
                $select = "SELECT * FROM user WHERE userid= $u_id";
                $select_action = mysqli_query($connection,$select);
                
                while($row = mysqli_fetch_assoc($select_action)){
                    $userimg = $row['userimg'];
                }
                
                confirm_Query($select_action);
            }
            
            $usertype = $_POST['user_type_selection'];
            $useremail = $_POST['useremail'];
            $userpass = $_POST['userpassword'];
            $userfname = $_POST['fname'];
            $userlname = $_POST['lname'];
            
            $edit_user  = "UPDATE user SET ";
            $edit_user .= "username = '$username', ";
            $edit_user .= "userimg = '$userimg', ";
            $edit_user .= "type = '$usertype', ";
            $edit_user .= "useremail = '$useremail', ";
            $edit_user .= "userpassword = '$userpass', ";
            $edit_user .= "fname = '$userfname', ";
            $edit_user .= "lname = '$userlname' ";
            $edit_user .= "WHERE userid = $sessionId";
            
            
            $edit_user_action = mysqli_query($connection ,$edit_user);
            confirm_Query($edit_user_action);
        }
?>
        
        
        
    