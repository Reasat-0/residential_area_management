<?php
    include "db.php";
?>
    <link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .fullpage{
            margin: 0 1%;
            height: auto;
        }
        .header {
            width: 97%;
            height: 100px;
            background-color: #0c6d66;
        }

        .home {
            padding-top: 20px;
            font-size: 20px;
            float: left;

        }

        .home a {
            text-decoration: none;
            padding: 10px 15px;
            color: antiquewhite;
        }

        .home i {
            padding-right: 10px;
            font-size: 200%;
        }

        .social-media {
            float: right;
            margin-top: 30px;

        }
        .social-media i {
            font-size: 200%;
            color: antiquewhite;
        }

        .houses {
            float: left;
            width: 32%;
            text-align: center;
            border: 2px solid #0c6d66;
            padding: 20px 0px;
        }

        .house_head {
            font-size: 300%;
            color: #041129;
        }

        h2 {
            color: forestgreen;
        }

    </style>
    <div class="fullpage">
        <div class="header">
            <div class="home">
                <a href="../../index.php"><i class="icon ion-md-home"></i>HOME</a>
            </div>
            <div class="social-media">
                <a href=""><i class="icon ion-logo-facebook"></i></a>
                <a href=""><i class="icon ion-logo-instagram"></i></a>
                <a href=""><i class="icon ion-md-call"></i></a>
            </div>

        </div>
        <?php
    
    $select_query = "SELECT * FROM house";
    $select_query_fun = mysqli_query($connection, $select_query);

    while( $row = mysqli_fetch_assoc($select_query_fun))
    {
        $house_id =$row['house_id'];
        $house_name = $row['house_name'];
        $house_img = $row['house_img'];
        $house_rent = $row['house_rent'];
        $house_adv = $row['advance'];
        $date = $row['date'];
        $house_status = $row['house_status'];
        $ra_name = $row['ra_name'];
        
    ?>
            <a href="house_profile.php?h_id=<?php echo $house_id; ?>">
                <div class="houses">
                    <img src="images/<?php echo $house_img ?>" style="height: 100px"> <br>
                    <h1 class="house_head">
                        <?php echo $house_name ?> </h1>
                    <h2>
                        <?php echo $ra_name ?>
                    </h2>
                </div>
            </a>


            <?php
    }
        
?>


    </div>
