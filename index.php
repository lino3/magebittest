<?php
    session_start();
    include_once "class.user.php";
    $user = new User();
 
    if (isset($_REQUEST['submit1'])) {
        extract($_REQUEST);
        $login = $user->check_login($emaillog, $passwordlog);
        if ($login) {
           header("location:home.php"); // Login Success
        } else {
            echo 'Wrong email or password'; // Login Failed
        }
    }
    if (isset($_REQUEST['submit2'])){
       extract($_REQUEST);
       $register = $user->reg_user($name, $emailsign, $passwordsign);
       if ($register) {
          echo 'Registration successful'; // Registration Success
       } else {
          echo 'Registration failed. Email already exits, please try again'; // Registration Failed
       }
    }
?>

<html>
    <head>
        <link href="style.css" rel="stylesheet"/>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <script src="jquery-1.10.2.min.js"></script>
        <script src="JQUERY%20Main.js"></script>
		<script type="text/javascript" language="javascript">
		function submitlogin() {
           var form1 = document.login;
           if(form.emaillog.value == ""){
              alert( "Enter email." );
              return false;
           }
           else if(form.passwordlog.value == ""){
              alert( "Enter password." );
              return false;
           }
        }
        function submitreg() {
           var form2 = document.reg;
           if(form.name.value == ""){
              alert( "Enter name." );
              return false;
           }
           else if(form.emailsign.value == ""){
              alert( "Enter email." );
              return false;
           }
           else if(form.passwordsign.value == ""){
              alert( "Enter password." );
              return false;
           }
        }
        </script>
    </head>
    <body>
        <div id="box">
            <div id="main"><img id="bdfolds" src="images/bg_folds.png" alt="Background folds" align="left"></div>
            
            <div id="loginform">
			<form action="" method="post" name="login">
                <h1>LOGIN<img src="images/logo.png" alt="Magebit logo" style="width:38px;height:28px;" align="right"></h1>
				<div id="underline"></div>
                <input id="loginemail" name="emaillog" type="email" placeholder="Email*"/><br>
                <input id="loginpass" name="passwordlog" type="password" placeholder="Password*"/><br>
                <input id="login_btnform" onclick="return submitlogin();" type="submit" name="submit1" value="LOGIN" style="width: 140px; height: 50px; margin-top: 30px;"/><p id="forgot">Forgot?</p>
            </div>
            
            <div id="signupform">
			<form action="" method="post" name="reg">
                <h1>SIGN UP<img src="images/logo.png" alt="Magebit logo" style="width:38px;height:28px;" align="right"></h1>
				<div id="underline"></div>
                <input id="signupname" name="name" type="text" placeholder="Name*"/><br>
                <input id="signupemail" name="emailsign" type="email" placeholder="Email*"/><br>
                <input id="signuppass" name="passwordsign" type="password" placeholder="Password*"/><br>
                <input id="signup_btnform" onclick="return submitreg();" type="submit" name="submit2" value="SIGN UP" style="width: 140px; height: 50px; margin-top: 30px;"/>
            </div>
            
            <div id="login_msg">Have an account?<div id="underline1"></div></div>
			<div id="login_msg2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div id="signup_msg">Don't have an account?<div id="underline1"></div>	</div> 
            <div id="signup_msg2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>			
            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>
                    
        </div>
    </body>
</html>