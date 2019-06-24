<style>
    .added_section{
        margin: 20px 5%; 
    }
    
    #selections{
        width: 20%;
        border: 2px solid #003f4e;
        padding: 5px 2%;
        
    }
    .select2{
        background-color: #abccd4;
        text-decoration: none;
    }
</style>                
                  
<div class='showTable'>

                                    
            <form action="" method="POST">
                 
<?php
    
    if(isset($_POST['checkBoxArray'])){
        
        foreach($_POST['checkBoxArray'] as $checkBoxValue){
            
           $bulk_option = $_POST['bulk_option'];
            
/*
            ***********------------DELETE---------------**********
            */   
        if($bulk_option == 'delete'){
            $delete = "DELETE FROM house WHERE house_id = {$checkBoxValue}";
            $delete_action = mysqli_query($connection,$delete);
        }
            
/*********************************************************************************
    ---------------Update Publish or Draft--------------------------
********************************************************************************/
            
        else if($bulk_option == 'published'){
            
                $update = "UPDATE house SET house_status = '{$bulk_option}' WHERE house_id = {$checkBoxValue}";
                $update_action = mysqli_query($connection,$update);
               // confirm_query($update_action);
        }
            
        else if($bulk_option == 'draft'){
                $update = "UPDATE house SET house_status = '{$bulk_option}' WHERE house_id = {$checkBoxValue}";
                $update_action = mysqli_query($connection,$update);
        }
        
    }
}  
    

?>
                  
                  <div class="added_section">
                      
                      <select name="bulk_option" id="selections">
                          
                          <option value="">Select Option</option>
                          <option value="published">Publish</option>
                          <option value="delete">Delete</option>
                          <option value="draft">Draft</option>
                          
                          
                          
                      </select>
                      
                      <input type="submit" name="submit" value="Apply" id="selections">
                      <a href="posts.php?source=add_houses" id="selections" class="select2">Add new</a>
                      
                      
                  </div>
                   <table>
                    <thead>
                        <th>Select</th>
                        <th>House ID</th>
                        <th>House Name</th>
                        <th>Image</th>
                        <th>Catagory</th>
                        <th>Rent</th>
                        <th>Advance</th>
                        <th>R/A Name</th>
                        <th>Comment Num</th>
                        <th>House_status</th>
                        <th>DELETE</th>
                        <th>EDIT</th>
                    </thead>
                    <tbody>
                       <tr>
                       
                       <?php
                           $select_home       = "SELECT * FROM house";
                           $select_home_query = mysqli_query($connection,$select_home);
                           while($row = mysqli_fetch_assoc($select_home_query)){
                               
                               $house_cat_id = $row['house_cat_id'];
                               $house_id = $row['house_id'];
                               $house_name = $row['house_name'];
                               $house_img = $row['house_img'];
                               $house_rent = $row['house_rent'];
                               $house_adv = $row['advance'];
                               $house_ra = $row['ra_name'];
                               $house_comment_count = $row['house_comment_count'];
                               $house_status = $row['house_status'];
                               
                        $catSelect = "SELECT * FROM catagories WHERE cat_id ={$house_cat_id}";
                        $catSelectAction = mysqli_query($connection , $catSelect) ;
                        while($row = mysqli_fetch_assoc($catSelectAction)){
                            $house_cat_title = $row['cat_title'];
                        }
                               
                               ?>
                        <td><input type="checkbox" name="checkBoxArray[]" value="<?php echo $house_id ?>"></td>
                    
                       <?php
                               
                        echo "<td>{$house_id}</td>
                        <td>{$house_name}</td>
                        <td><img src='../images/{$house_img}' style ='height: 50px'></td>
                        
                        
                        
                        <td>{$house_cat_title}</td>
                        
                        
                        
                        <td>{$house_rent}</td>
                        <td>{$house_adv}</td>
                        <td>{$house_ra}</td>
                        <td>{$house_comment_count}</td>
                        <td>{$house_status}</td>
                        <td><a href='posts.php?delete={$house_id}'>DELETE</a></td>
                        <td><a href='posts.php?source=edit_houses&h_id={$house_id}'>EDIT_IT</a></td>
                        </tr>
                        ";  
                           }
                        ?>
                        
<?php 
        if(isset($_GET['delete'])){
            $get_house_id = $_GET['delete'];
            $delete_house_query = "DELETE FROM house WHERE house_id = {$get_house_id}";
            $deleting_house = mysqli_query($connection,$delete_house_query);
          header('Location: posts.php');

        }
                           
?>
                        </tbody>
                </table>  
    </form>
                </div>
                   
                   

                   
                   