<?php  include "adincludes/ad_header.php"; ?>
<?php  include "adincludes/left_menu.php"; ?>
       

       
<style>
        .catfield label {
            font-size: 20px;
        }

        input[type=text], 
        input[type=email], 
        input[type=password] 
    {
            width: 90%;
            height: 30px;
            border: 3px solid rgba(0, 41, 54, 0.59);

        }

        input[type=submit] {
            margin: 2% 0;
            width: 30%;
            height: 35spx;
            font-size: 15px;
            border: 4px solid rgba(0, 41, 54, 0.59);
            border-radius: 10%;

        }

        table {
            width: 100%;
        }

        th {
            background-color: rgba(4, 54, 56, 0.51);
            height: 35px;
            color: white;

        }

        td {
            border: 1px solid black;
            background-color: white;
            height: 30px;
            text-align: center;
        }

        h2 {
            color: red;
        }

        .bottommain {
            height: 100vh;
        }

        .form_section {
            float: left;
            width: 50%;
        }

        .showTable {
            width: 60%;
            margin: 0 0%;
            overflow: hidden;
        }
    

    </style>


    <div class="main-content">
        <div class="topmain">
            <h1>
                USERS
            </h1>

        </div>
           

<?php  

if(isset($_GET['source'])){
    $source = $_GET['source'];
}
else{
    $source ='';
}
        
        
switch($source)
{

case 'add_users';
include "adincludes/add_users.php";
break;

case 'edit_users';
include "adincludes/edit_users.php";
break;

default;
include "adincludes/user_table.php";
break;
        
}        

?>



        </div>
   <!-- </div>-->