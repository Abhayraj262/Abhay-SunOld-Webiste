<?php
include('db.php');

$cookie_username = '';

if (isset($_COOKIE['username'])) {

	$cookie_username = $_COOKIE['username'];
}

$cookie_password = '';

if (isset($_COOKIE['password'])) {

	$cookie_password = $_COOKIE['password'];
}


if (isset($_POST['submit'])) {

    if( isset($_POST['username']) and !empty($_POST['username']) and isset($_POST['password']) and !empty($_POST['password']) ){

        $qry = "select * from admin_users where (user_login='".$_POST['username']."' or user_email='".$_POST['username']."') and md5(user_pass)='".$_POST['password']."'";

        $res = $conn->query("select * from admin_users where (user_login='".$_POST['username']."' or user_email='".$_POST['username']."') and user_pass=md5('".$_POST['password']."')");

        if( $res->num_rows > 0 ){

            $data = $res->fetch_object();
        
            if( $data->user_status == 1 ){

                $_SESSION['user_id']=$data->ID;
                $_SESSION['user_login']=$data->user_login;
                $_SESSION['user_nicename']=$data->user_nicename;
                $_SESSION['user_email']=$data->user_email;

                if (isset($_POST['rememberme'])) {	

                    setcookie('username', $_POST['username'], time()+60*60*24*365);
                    setcookie('password', $_POST['password'], time()+60*60*24*365);
                
                } else {	

                   setcookie('username', "", false);
                   setcookie('password', "", false);
                
                }
               
                header("location:index.php");

            }else{

                $msg = "User is not active!";

            }
           

        } else {

            $msg = "Login Information Incorrect!";
        }

    }else{

        $msg = "Login Information Incorrect!";
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .login-footer {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
        <?php if (!empty($msg)) { ?>

            <div class="errormsg" style="color:red;"><?php echo $msg;?></div>
        <?php } ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username"
                    value="<?php echo $cookie_username; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    value="<?php echo $cookie_password; ?>" required>
                
                    <div class="checkbox keepme">
                        <label><input type="checkbox" name="rememberme" value="1" <?php if (!empty($cookie_username)) {
                        echo "checked";
                    } ?>>&nbsp;&nbsp;Keep me signed in</label>
                    </div>

            </div>
            <input type="submit" name="submit" value="Login">
        </form>
        <!-- <div class="login-footer">
        <p>Don't have an account? <a href="/register">Register here</a></p>
    </div> -->
    </div>

</body>

</html>