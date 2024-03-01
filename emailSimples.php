<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>

<body>

   Welcome
   <?php 
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
       echo $_POST["name"]; 
   } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["name"])) {
       echo $_GET["name"];
   }
   ?><br>
   Your email address is:
   <?php 
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
       echo $_POST["email"]; 
   } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"])) {
       echo $_GET["email"];
   }
   ?>

</body>

</html>