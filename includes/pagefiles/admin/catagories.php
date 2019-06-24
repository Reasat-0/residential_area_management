<?php 
    include "adincludes/ad_header.php";
?>
<?php
    include "adincludes/left_menu.php";
?>
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
            width: 70%;
            margin-left: 14%;

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
            width: 45%;
            overflow: hidden;
        }

    </style>


    <div class="main-content">
        <div class="topmain">
            <h1>
                CATAGORIES SECTION
            </h1>

        </div>
        <div class="bottommain">

            
            <div class="form_section">
                <!--<h2 style="color:#ffffff">CATAGORIES SECTION</h2>-->
                <form action="" method="post">

                    <div class="catfield">
                        <label for="catfield">Catagory Name : </label>
                        <input type="text" name="catName">
                    </div>
                    <div class="catsubmit">
                        <input type="submit" value="Add Catagories" name="submit">
            <?php 
                        insert_catagories();
             ?>
                    </div>

                </form>
            </div>


            <div class="showTable">
                <table>
                    <thead>
                        <th>CAT ID </th>
                        <th>CAT TITLE</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>

       <!-- ///////////////////////***************SELECTING AND SHOWING********************////////////////////-->
            <?php   finding_catagories();        ?>

                    </tbody>
                </table>
            </div>

                       <!--////////////////*********DELETING CATAGORIES********************/////////////////////-->
            <?php   delete_catagories(); ?>




                <?php
                       if(isset($_GET['update'])){
                           $cat_get_id = $_GET['update'];
                           
                           include "adincludes/update_catagories.php";
                           
                       }
            
               
            ?>









        </div>
    </div>

    </body>

    </html>
