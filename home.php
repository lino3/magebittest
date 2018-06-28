<?php
   session_start();
   include_once "class.user.php";
   $user = new User(); $id = $_SESSION['id'];
   if (!$user->get_session()){
      header("location:index.php");
   }
 
   if (isset($_GET['q'])){
      $user->user_logout();
      header("location:index.php");
   }
?>

<html>
    <head>
    </head>
    <body>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <div id="container">
        <div id="header"><a href="home.php?q=logout">LOGOUT</a></div>
        <div id="main-body">
        <h1>Hello <?php $user->get_name($id); ?></h1>
        </div>
        <div id="footer"></div>
        </div>
    </body>
</html>