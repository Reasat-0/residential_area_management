<?php   
    
    function confirm_Query($query_action){
        global $connection;
        if(!$query_action)
        {
            die("NOT DONE".mysqli_error($connection));
        }
        else 
            echo "<h3> DONE </h3>";
    }


 


    function insert_catagories(){
        
        global $connection;
    
       if(isset($_POST['submit'])){
                  $catName =$_POST['catName'];
                  if($catName == "" || empty($catName)){
                      echo "<h2>Put a Catagory name </h2>";
                  }
                  else
                  {
                      $insert = "INSERT INTO catagories(cat_title)";
                      $insert .= "VALUES('{$catName}')";
                      
                      $inserting = mysqli_query($connection , $insert);
                      
                      if(!$inserting)
                          die("failed".mysqli_error($connection));
                  }
              }
}



    function finding_catagories()
    {
        
        global $connection;
        
                $select_cat_query = "SELECT * FROM catagories";
                $selected = mysqli_query($connection,$select_cat_query);
                       
                       
                        while($row = mysqli_fetch_assoc($selected))
                 {
                     $cat_id    = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                    
                    echo "<tr>
                           <td>{$cat_id}</td>
                           <td>{$cat_title}</td>
                           <td><a href='catagories.php?delete={$cat_id}'>Delete</a></td>
                           <td><a href='catagories.php?update={$cat_id}'>Update</a></td>
                          </tr>";
                 }
    }

    function delete_catagories(){
        
        global $connection;
        
             if(isset($_GET['delete']))
                    {
                       $get_cat_id    = $_GET['delete'];
                       $delete_query  = "DELETE FROM catagories WHERE cat_id={$get_cat_id}";
                       $deleting      = mysqli_query($connection, $delete_query);
                       header('Location:catagories.php');
                    }
    }


    function delete_comments(){
        global $connection;
        
        if(isset($_GET['delete']))
                    {
                       $get_cat_id    = $_GET['delete'];
                       $delete_query  = "DELETE FROM comments WHERE cat_id={$get_cat_id}";
                       $deleting      = mysqli_query($connection, $delete_query);
                       header('Location:comments.php');
                    }
        
    }

?>
