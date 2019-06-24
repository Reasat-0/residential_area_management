
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

    <?php
    
    if(isset($_GET['u_id']))
    {
        $u_id = $_GET['u_id'];
        
        $user_to_edit = "SELECT * FROM user WHERE userid = $u_id";
        $user_selection = mysqli_query($connection,$user_to_edit);
        
        if(!$user_selection){
            die("not done".$connection);
        }
        while($row_user = mysqli_fetch_assoc($user_selection))
        {
            $u_name = $row_user['username']; 
            $u_img = $row_user['userimg']; 
            $u_type = $row_user['type']; 
            $u_email = $row_user['useremail']; 
            $u_pass = $row_user['userpassword'];
            $u_fname = $row_user['fname'];
            $u_lname = $row_user['lname'];
        }
    }



?>
    <h2 style="font-size: 60px; color: #1c232c; margin-left: 30%;">
        EDIT Users Here
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
                    if($u_type = 'admin'){
                    echo "<option value='Subscriber'>Subscriber</option>";  
                  }  
                ?>
 
                 
                <option value="<?php echo $u_type ?>"><?php echo $u_type ?></option>
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
                <input type="submit" name="edituser" value="EDIT">
            </div>
            
        </form>
<?php 
        if(isset($_POST['edituser']))      
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
            $edit_user .= "WHERE userid = $u_id";
            
            
            $edit_user_action = mysqli_query($connection ,$edit_user);
            if(!$edit_user_action){
                
            }
            else
                
                echo "<p>Post Updated </p> <a href='userprofile.php?user_id={$u_id}'> View Users </a>";
                echo "<p> Or </p> <a href='users.php'> More  </a>";

        }
?>

        </div>

</body>

</html>
