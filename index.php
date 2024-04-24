<?php session_start();
?>
<!Doctype html>
<head>
<title>E-Music</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style type="text/css">
*
{
margin:0;
padding:0;
}
body{
background-image:url("images/music.jpg");
background-repeat:no-repeat;
background-size:cover;
}
.info
{
margin:30px auto;
height:500px;
width:400px;
text-align:center;
border-radius:30px;
color:#ffffff;
padding:30px;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-3"></div>
<div class=" col-6 info bg-dark">
<form name="front" action="index.php" method="GET">
<h1 class="m-2 text-warning">Welcome to Symphony</h1>
  <input name="user" type="text" class="form-control mb-3 mt-5"  placeholder="Username">
  <input name="pass" type="password" class="form-control"  placeholder="Password">
  <div class="d-grid mt-4">
  <button class="btn btn-primary" name="loginbtn" type="submit">Login</button>
  </div>
<h4 class="text-success m-5">New User? Create a new account <a href="register.php">Sign up</a></h4>
</div>
<div class="col-3"></div>
</div>
</div>

<?php
if(isset($_REQUEST["loginbtn"]))
{
$user=$_REQUEST["user"];
$passwd=$_REQUEST["pass"];
include('connection.php');

$qry="SELECT * FROM login WHERE username='$user' AND password='$passwd'";
$result=mysqli_query($con,$qry);
if(mysqli_affected_rows($con)>0)
{
	$record=mysqli_fetch_array($result);
	$_SESSION["user"]=$record["username"];
	$_SESSION["usertype"]=$record["usertype"];
	
	header("Location:musicon.php");
}
else
{
	echo "<h1>Invalid Username and Password";
}
}
?>


</body>
</html>