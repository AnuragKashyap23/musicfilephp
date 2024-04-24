<!Doctype>
<html>
<head>
<title>Welcome</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/fe927cd267.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<style type="text/css">
*
{
margin:0;
padding:0;
}
body
{
background-color:#040d21;
}
.main
{
width:550px;
height:500px;
text-align:center;
margin:0 auto;
border-radius:20px;
background-color:#9933ff;
}
td
{
text-align:center;
font-size:20px;
margin:5px;
border:2px solid #000000;
width:200px;
font-weight:bold;
}
table
{
margin:0 auto;
}
label
{
font-weight:bold;
}
h1
{
color:#45f0ff;
font-size:30px;
}
@media only screen and (max-width:768px)
{
.wide
{
width:100%;
}
}

</style>
</head>
<body>
<div class="main p-4 my-3">
<form name="songinput" method="POST" action="songup.php" enctype="multipart/form-data">
  <div class="row mb-3">
  
  <h3>ADMIN</h3>
  </div>
  <div class="row mb-3">
    <label for="songname" class="col-sm-4 col-form-label-lg">Song Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="songname"  required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="singername" class="col-sm-4 col-form-label-lg">Singer</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="singername" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="songfile" class="col-sm-4 col-form-label-lg">File</label>
    <div class="col-sm-8">
      <input type="file" class="form-control" name="songfile" accept="audio/*" required>
    </div>
  </div>

   
  <div class="row mb-3">
    <label for="songim" class="col-sm-4 col-form-label-lg">Image</label>
    <div class="col-sm-8">
      <input type="file" class="form-control" name="songim" accept="image/*" required></input>
    </div>
    </div>
    <div class="row mb-3">
    <label for="pcat" class="col-sm-4 col-form-label-lg">Category</label>
    <div class="col-sm-8">
	<select name="pcat" class="form-select" required>
	<option>--------</option>
     <?php
	 include('connection.php');
	 $qry="SELECT *  FROM category";
	 $result=mysqli_query($con,$qry);
	 while($record=mysqli_fetch_array($result))
	 {
		echo"<option value='".$record["catname"]."'>".$record["catname"]."</option>";
	 }
	 ?>
    </div>
   </div>
  

  <input type="submit" name="btnsave" value="Save" class="btn btn-warning">
</form>

<?php
if(isset($_REQUEST["btnsave"]))
{
$song=$_REQUEST["songname"];
$singern=$_REQUEST["singername"];
$category=$_REQUEST["pcat"];

$source_file_mp3 = $_FILES["songfile"]["tmp_name"];
$target_file_mp3 = 'songs/' . $_FILES["songfile"]["name"];
    
$source_file = $_FILES["songim"]["tmp_name"];
$target_file = 'images/' . $_FILES["songim"]["name"];
if (move_uploaded_file($source_file, $target_file) && move_uploaded_file($source_file_mp3, $target_file_mp3)) 
{
    $songname=$_FILES["songfile"]["name"];
	$imagename=$_FILES["songim"]["name"];
	include('connection.php');
	$qry="INSERT INTO song(sname,scategory,sfile,simage,singer)
	VALUES ('$song','$category','$songname','$imagename','$singern')";
	if(mysqli_query($con,$qry))
	{
	echo"<h1>Record Saved Successfully!!!!</h1>";
	}
	else
	{
		echo"Error Occurred ".mysqli_error($con);
	}
}
else
{
    echo"<h1>Error in file uploading</h1>";   
}
}
?>

</body>
</html>