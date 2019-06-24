                
                  
<div class='showTable'>
                   <table>
                    <thead>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Image</th>
                        <th>Password</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Statuss</th>
                        <th>DELETE</th>
                        <th>ROLE</th>
                        <th>ROLE</th>
                        <th>EDIT</th>
                    </thead>
                    <tbody>
                       <tr>
                       
                       <?php
                           $select_user       = "SELECT * FROM user";
                           $select_user_query = mysqli_query($connection,$select_user);
                           while($row = mysqli_fetch_assoc($select_user_query)){
                               
                               /*$house_cat_id = $row['house_cat_id'];*/
                               $user_id = $row['userid'];
                               $user_name = $row['username'];
                               $user_email = $row['useremail'];
                               $user_img = $row['userimg'];
                               $user_password = $row['userpassword'];
                               $fname = $row['fname'];
                               $lname= $row['lname'];
                               $status = $row['type'];
                               
                               
/*                        $catSelect = "SELECT * FROM catagories WHERE cat_id ={$house_cat_id}";
                        $catSelectAction = mysqli_query($connection , $catSelect) ;
                        while($row = mysqli_fetch_assoc($catSelectAction)){
                            $house_cat_title = $row['cat_title'];
                        }*/
                        echo "<td>{$user_id}</td>
                        <td>{$user_name}</td>
                        <td><img src='../images/{$user_img}' style ='height: 50px'></td>
                        
                        
                        
                        <td>{$user_email}</td>
                        
                        
                        
                        <td>{$user_password}</td>
                        <td>{$fname}</td>
                        <td>{$lname}</td>
                        <td>{$status}</td>
                        <td><a href='users.php?delete_user={$user_id}'>DELETE</a></td>
                        <td><a href='users.php?make_admin={$user_id}'>Make Admin</a></td>
                        <td><a href='users.php?make_sub={$user_id}'>Make Subscriber</a></td>
                        <td><a href='users.php?source=edit_users&u_id={$user_id}'>EDIT_IT</a></td>
                        </tr>
                        ";  
                           }
                        ?>
                        
<?php 
        if(isset($_GET['make_admin'])){
            $get_user_id = $_GET['make_admin'];
            $user_type_query = "UPDATE user SET type = 'Admin' WHERE userid = $get_user_id ";
            $update_type = mysqli_query($connection,$user_type_query);
            header('Location: users.php');
            if(!$update_type){
                die('NOt done'.mysqli_error($connection));
            }
        }
                           
        if(isset($_GET['make_sub'])){
            $get_user_id = $_GET['make_sub'];
            $update_query = "UPDATE user SET type = 'Subscriber' WHERE userid = {$get_user_id}";
            $action = mysqli_query($connection,$update_query);
          header('Location: users.php');

        }
        if(isset($_GET['delete_user'])){
            $user = $_GET['delete_user'];
            $delete = "DELETE FROM user WHERE userid = $user ";
            $delete_action = mysqli_query($connection,$delete);
            header('Location: users.php');
            if(!$delete_action){
                die('NOt done'.mysqli_error($connection));
            }
            
            
            
            
        }                 
?>
                        </tbody>
                </table>  
                </div>
                   
                   

                   
                   