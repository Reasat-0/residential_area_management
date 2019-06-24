<div class='showTable'>
    <table>
        <thead>
            <th>Comment id</th>
            <th>Comment House id</th>
            <th>Comment Author</th>
            <th>Comment Status</th>
            <th>Comment Content</th>
            <th>Comment Email</th>
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <tr>

                <?php
                           $select_com = "SELECT * FROM comments";
                           $select_com_query = mysqli_query($connection,$select_com);
                           while($row = mysqli_fetch_assoc($select_com_query)){
                               
                               $comment_id = $row['comment_id'];
                               $comment_house_id = $row['comment_house_id'];
                               $comment_author = $row['comment_author'];
                               $comment_status = $row['comment_status'];
                               $comment_email = $row['comment_email'];
                               $comment_content = $row['comment_content'];
                               $date = $row['date'];
                               

                        echo "<td>{$comment_id}</td>";
               /*------------------------------------------------------------------------
                **************SELECTING HOUSE NAME BASED ON COMMENTS********************
                ------------------------------------------------------------------------*/   
                    $select_house = "SELECT * FROM house WHERE house_id=$comment_house_id";
                    $action = mysqli_query($connection,$select_house);
                               
                    while($row=mysqli_fetch_assoc($action)){
                        $house_name = $row['house_name'];
                    }

                        echo"<td><a href='../house_profile.php?h_id=$comment_house_id'>{$house_name}</a></td>
                        <td>{$comment_author}</td>
                        <td>{$comment_status}</td>
                        <td>{$comment_content}</td>
                        <td>{$comment_email}</td>
                        <td>{$date}</td>
                        <td><a href='comments.php?delete={$comment_id}'>DELETE</a></td>
                        <td><a href='comments.php?approve={$comment_id}'>APPROVE</a></td>
                        <td><a href='comments.php?unapprove={$comment_id}'>UNAPPROVE</a></td>
                        </tr>
                        ";  
                           }
                        ?>

                    <?php 
       if(isset($_GET['delete'])){
            $get_comment_id = $_GET['delete'];
            $delete_comment_query = "DELETE FROM comments WHERE comment_id = {$get_comment_id}";
            $deleting_comment = mysqli_query($connection,$delete_comment_query);
          header('Location: comments.php');

        }
                           
                           
    
                           
                           
                           
       if(isset($_GET['unapprove'])){
           $get_status = $_GET['unapprove'];
           $status_query = "UPDATE comments SET comment_status= 'unapproved' WHERE comment_id=$get_status";
           $action = mysqli_query($connection,$status_query);
           header('Location: comments.php');
       }
                           
                           
        if(isset($_GET['approve'])){
           $get_status = $_GET['approve'];
           $status_query = "UPDATE comments SET comment_status= 'approved' WHERE comment_id=$get_status";
           $action = mysqli_query($connection,$status_query);
           header('Location: comments.php');
       }
                           
?>
        </tbody>
    </table>
</div>
