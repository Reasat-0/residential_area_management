<style>
    /*.left-menu div{
        border: 1px solid blue;
    }
.left-menu{
    margin: 0;
    padding: 5px 0;
    width: 15%;
    background-color: #493c3c;
    text-align: center;
    height: 80vh;
}

    .left-menu ul{
        list-style: none;
        
    }
    .left-menu ul li{
        margin: 50px 10%;
        border-bottom: 2px solid white;
    }
    
    .left-menu ul li a {
        text-decoration: none;
        color: white;
        
    }
    .dropedit{
        margin: 25px 0px;
    }*/
     .middlePart{
        height: 90vh;
    }
    .leftMenu{
            float: left;
			background-color: black;
            overflow: hidden;
            clear: both;
            padding: 50px 2%;
            width: 10%;
            height: 100%;
		}
    .leftMenu li{
        padding: 30px 0;
        
    }
		li a{
			color: white;
    }
    .rightMenu{
        height: 100%;
        background-color: #0b545d;
    }
    .rigthMenu h1{
        font-size: 120px;
        color: aliceblue;
    }
    
    
</style>
    

  
<div class="middlePart">
		<div class="leftMenu">
			<ul>
        <li><a href="">Dashboard</a></li>
        
        <li><a href="catagories.php">Catagories</a></li> 
        <li><a href="comments.php">Comments</a></li> 
        
        <li><a href="userprofile.php">Profile</a></li>
        <div class="drop">
        <div class="dropdown">
            <button class="dropbtn">Posts
                    </button>
            <div class="dropdown-content">
                <a href="posts.php">View Houses</a>
                <a href="posts.php?source=add_houses">Add Houses</a>
            </div>
        </div>      
        <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-caret-down"></i>
                     User
                      
                    </button>
            <div class="dropdown-content">
                <a href="users.php">Users</a>
                <a href="users.php?source=add_users">Add User</a>
            </div>
        </div>
        </div>
        
        
        
        

        
</ul>

		</div>
		
		
		