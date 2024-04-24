<!Doctype html>
<head>
<title>Music/register</title>
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
background-image:url("images/music1.jpg");
background-repeat:no-repeat;
background-size:cover;
}
.info
{
margin:20px;
text-align:center;
border-radius:30px;
color:#ffffff;
padding:20px;
}
[class*="col-"]
{
float:left;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
  [class*="col-"] {
    width: 100%;
  }
}
</style>
</head>
<body>
<div class="row">
<div class="col-8"></div>
<div class="col-4">
<div class="info bg-dark bg-opacity-50">
<form name="front" action="register.php" method="POST">
<h1 class="m-2 text-warning">Register</h1>
  <input name="txtuser" type="text" class="form-control mb-2 mt-4"  placeholder="Username">
  <input name="txtname" type="text" class="form-control mb-2"  placeholder="Name">
  <input name="mobnum" type="number" class="form-control mb-2"  placeholder="Mobile no.">
  <input name="pass" type="password" class="form-control"  placeholder="Password">
  <div class="d-grid mt-4">
  <button class="btn btn-primary" name="btnsave" type="submit">Sign up</button>
  </div>
  <h4 class="text-success mt-4">Back to Login page <a href="index.php">Click here</a></h4>
</div>
</div>
</div>
<?php
if(isset($_REQUEST["btnsave"]))
{
$user=$_REQUEST["txtuser"];
$name=$_REQUEST["txtname"];
$mob=$_REQUEST["mobnum"];
$passw=$_REQUEST["pass"];

include('connection.php');
$qry="INSERT INTO login (username,password,usertype,name,mobile)
VALUES ('$user','$passw','user','$name','$mob')";
if(mysqli_query($con,$qry))
{
echo"<h1 class=''>Record Saved Successfully!!!!</h1>";
}
else
{
	echo"Error Occurred ".mysqli_error($con);
}


}
?>

</body>
</html>