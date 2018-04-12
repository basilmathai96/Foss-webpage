<?php
// define variables and set to empty values
$passErr = $emailErr = "";
$password= $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


 if (empty($_POST["email"])) {
   $emailErr = "Email is required";
 } else {
   $email = $_POST["email"];
   // check if e-mail address is well-formed
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format";
   }
 }
 if (empty($_POST["password"])) {
   $passErr = "password is required";
 } else {
   $password =$_POST["password"];
 }



$servername = "localhost";
$username = "root";
$dbpassword = "amalashok97";
$dbname = "quiz";

// Create connection
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE email='$email' and password='$password' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        setcookie("user",$row['email']);
        header("Location: http://localhost/quiz.php");
    }
} else {
    echo "Authentication Error";
}

mysqli_close($conn);
}
?>


<html>
<head>
	<title>Sign In</title>
	<!---<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="style.css">   
</head>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="login-box">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>

  <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <label>Email</label><br>
    <input class="form-control" type="email" name="email"><small><?php echo $emailErr ?></small><br>
    <label>Password</label><br>
    <input class="form-control" type="password" name="password"><small><?php echo $passErr ?></small><br>
    <input class="form-control" type="submit" name="signup" value="Sign In">
            <a href="/signup.php">Signup</a> 
  </form>
</div>
</body>
</html>
