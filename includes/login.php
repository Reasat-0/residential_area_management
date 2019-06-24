<?php
        include "pagefiles/db.php";
?>
<?php
        session_start();
?>      

<?php

        
        if(isset($_POST['log_in']))
        {
        
        $uemail = $_POST['log_email'];
        $upassword = $_POST['log_password'];
        
        $uemail = mysqli_real_escape_string($connection,$uemail);
        $upassword = mysqli_real_escape_string($connection,$upassword);
        
        $userSelection = "SELECT * FROM user WHERE useremail= '{$uemail}'";
        $selection = mysqli_query($connection,$userSelection);
            
        while($row = mysqli_fetch_assoc($selection)){
        $db_useremail = $row['useremail']; 
        $db_password = $row['userpassword'];
        $db_fname = $row['fname'];
        $db_usertype = $row['type'];
        $db_userid = $row['userid'];
            
        }
            if($uemail === $db_useremail && $upassword === $db_password){
                $_SESSION['utype'] = $db_usertype;
                $_SESSION['fname'] = $db_fname;
                $_SESSION['userid'] = $db_userid;
                $_SESSION['useremail'] = $db_useremail;
                
                header("Location: pagefiles/admin/admin.php");
            }
            else{
                header("Location: ../index.php");
            }
            
           
        
        }
?>
