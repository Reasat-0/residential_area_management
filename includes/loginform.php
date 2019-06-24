<style>
    .login{
        width: 50%;
        font-size: 40px;
        background-color: #c4c4c4;
        margin: 60px 20%;
        padding: 20px 0;
        border: 10px solid #1b1616;
        height: 60vh;
        text-align: center;
    }
    input[type=text],
    input[type=password]
    {
        width: 60%;
        height: 30px;
    }
    input[type=submit]{
        width: 30%;
        height: 20px;
    }
    body{
        background-color: #03392d;
    }
    /*.input-box{
        margin: 0 30%;
    }*/
</style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
       <div class="login">
            <form action="login.php" method="post">
                <div class="input-box">
			    <label for="">Email</label> <br>
			    <input type="text" name="log_email"> <br> <br>
			    </div>
			    <div class="input-box">
			    <label for="">Password</label> <br>
			    <input type="password" name="log_password"> <br> <br>
                </div>
                <div class="input-box">
			    <input type="submit" name="log_in" value="login">
			    </div>
			</form>
			
			</div>
    
</body>
</html>