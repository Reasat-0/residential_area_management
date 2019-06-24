<?php  include "adincludes/ad_header.php"; ?>
<?php  include "adincludes/left_menu.php"; ?>
       

       
<style>
        .catfield label {
            font-size: 20px;
        }

        input[type=text] {
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
            width: auto;
            margin: 0 0%;
            overflow: hidden;
        }
    

    </style>


    <div class="main-content">
        <div class="topmain">
            <h1>
                Houses
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

case 'add_houses';
include "adincludes/add_houses.php";
break;

case 'edit_houses';
include "adincludes/edit_houses.php";
break;

default;
include "adincludes/house_table.php";
break;
        
}        

?>



        </div>
   <!-- </div>-->