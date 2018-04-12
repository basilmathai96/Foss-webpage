<?php
// define variables and set to empty values
$nameErr = $emailErr = $passErr = $confPassErr = "";
$name = $email = $password = $confpassword  = "";
$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["name"])) {
   $nameErr = "Name is required";
   $flag =1;
 } else {
   $name =$_POST["name"];
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = "Only letters and white space allowed";
     $flag =1;
   }
 }

 if (empty($_POST["email"])) {
   $emailErr = "Email is required";
   $flag =1;
 } else {
   $email = $_POST["email"];
   // check if e-mail address is well-formed
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format";
     $flag =1;
   }
 }

 if (empty($_POST["password"])) {
   $passErr = "password required";
   $flag =1;
 } else {
   $password=$_POST["password"];
   if (empty($_POST["confpassword"])) {
     $confPassErr = "password required";
     $flag =1;
   }else{
     if($password != $_POST["confpassword"] ){
       $confPassErr="both password should be equal";
       $flag =1;
     }
   }
 }
 if ($flag == 0){
   echo "No error";
    $servername = "localhost";
    $username = "root";
    $dbpassword = "amalashok97";
    $dbname = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (name,email,password)
    VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $dbErr = "No Error";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    if($dbErr == "No Error"){
      header("Location: http://localhost/signin.php");
    }
 }




}
?>

<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div style="margin: auto;
      width: 50%;
      border: 90px solid blue;
      border-radius:18px;
      padding: 70px;">

  <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <label>Name</label><br>
    <input class="form-control" type="text" name="name"><small><?php echo $nameErr ?></small><br>
    <label>Email</label><br>
    <input class="form-control" type="email" name="email"><small><?php echo $emailErr ?></small><br>
    <label>Password</label><br>
    <input class="form-control" type="password" name="password"><small><?php echo $passErr ?></small><br>
    <label>Confirm Password</label><br>
    <input class="form-control" type="password" name="confpassword"><small><?php echo $confPassErr ?></small><br>

    <input class="form-control" type="submit" name="signup" value="Sign Up" href="#">
  </form>
</div>
</body>
</html>
