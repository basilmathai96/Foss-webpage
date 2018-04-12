<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){

  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Quiz</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body>
     <div style="background-color:white;text-align: center;height:100%; padding-top:15%;">
     <h1>You are Logged in as</h1>
     <h1><?php echo $_COOKIE["user"] ?></h1>
   </div>

   </body>
 </html>
