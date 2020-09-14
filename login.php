<?php 
require("functions.php");

if (isset($_POST["register"])){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$password = $_POST["password"];
    $confirm_password = $_POST['confirm_password'];
    if($password != $confirm_password){
    	$msg = 'swal({ title: "Registration failed!",text: "Entered passwords don\'t match!",icon: "error",});';
    } else{
    	
    $password=md5($password);

	$query="Insert INTO USERS(NAME, EMAIL, PASSWORD) VALUES ('".$name."', '".$email."', '".$password."')";  
	if (!query($query))
		$msg = 'swal({ title: "Registration failed!",text: "Email already in use!",icon: "error",});';
	else
		$msg = 'swal({ title: "Registration success!",text: "You can login now!",icon: "success",});';
    }
	
}


if(isset($_POST["login"])){
	//echo "Inside Login Scope";
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$query = "SELECT USER_ID FROM USERS WHERE EMAIL='".$email."' AND PASSWORD = '".$password."' LIMIT 1";
	//echo $query;
	$result = query($query);
	if (mysqli_num_rows($result) == 1){
		$_SESSION["USER_ID"] = mysqli_fetch_assoc($result)["USER_ID"];
	  	redirect('index.php');	
	}
	else{
		$msg = 'swal({ title: "Try Again!",text: "Invalid Credentials!",icon: "error",});';
	}
	
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./login.css">
    <title>Assignment - Login</title>
   
  </head>
  <body>

  
<div class="row">
    <div class="col-md-6 mx-auto p-0 fixed-center">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-space">
                        <form method="POST" class="login" id="login">
                            <div class="group"> <label for="user" class="label">Email</label> <input name="email" type="email" class="input" placeholder="Enter your email" required> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input name="password" type="password" class="input" placeholder="Enter your password" required> </div>
                            <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                            <div class="group"> <input name="login" type="submit" class="button" value="Sign In"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="#">Forgot Password?</a> </div>
                        </form>

                        <form method="POST" class="sign-up-form" id="register">
                            <div class="group"> <label for="user" class="label">Name</label> <input name="name" type="text" class="input" placeholder="Enter your name" required> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input name="password" type="password" class="input" data-type="password" placeholder="Create your password" required> </div>
                            <div class="group"> <label for="pass" class="label">Repeat Password</label> <input name="confirm_password" type="password" class="input" data-type="password" placeholder="Repeat your password" required> </div>
                            <div class="group"> <label for="pass" class="label">Email Address</label> <input name="email" type="email" class="input" placeholder="Enter your email address" required> </div>
                            <div class="group"> <input name = "register" type="submit" class="button" value="Sign Up"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <label for="tab-1">Already Member?</label> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <?php
    if(isset($msg)){
    	echo '<script> '.$msg.' </script>';
    }
    ?>
  </body>
</html>

