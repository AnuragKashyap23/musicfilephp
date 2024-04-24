<?php session_start();
if(isset($_SESSION["user"]) &&isset($_SESSION["usertype"]))
{
?>
<!Doctype>
<html>
<head>
<title>Symphony</title>
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
.menu
{
width:100%;
background-color:#000000;
color:#ffffff;
height:50px;
}
.box
{
height:270px;
width:270px;
background-color:#000000;
float:left;
color:white;
margin:10px;
padding:12px;
border-radius:20px;
text-align:center;
border:5px solid blue;
}
body
{
background-color:#0011ff;
}
@media only screen and (max-width: 992px)
{
.hide
{
display: none;
}
}

</style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Symphony</a>
    
    <div class="navbar-toggler navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item hide">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item hide">
          <a class="nav-link" href="#">Category</a>
        </li>
		 <li class="nav-item hide">
          <a class="nav-link" href="#">Latest</a>
        </li>
		 <li class="nav-item hide">
          <a class="nav-link" href="#">Add Song</a>
        </li>
		
      </ul>
      <form class="d-flex" name="srch" method="POST" action="musicon.php">
        <input class="form-control me-2" type="text" name="song" value="">
        <button class="btn btn-outline-success navbar-brand" name="btnsub" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<br>
<?php
if (isset($_REQUEST["btnsub"]))
{
    $name = $_REQUEST["song"];
    if ($name != "")
    {
    $qry = "SELECT * FROM song where sname like '%".$name."%'";
    } 
    else 
    {
        $qry = "SELECT * FROM song where sname=$name";
    }
			include 'connection.php';
            $result = mysqli_query($con, $qry);
            while ($rowdata = mysqli_fetch_array($result)) 
                    {
                echo"<div class='box'>
            <div  style='padding:10px;'>
            <img src = 'images/" . $rowdata["simage"] . "' ></div>
            <div>
            Song-
            <span style='font-size:20px;'>" . $rowdata["sname"] . "</span><br></div>
            
            <audio controls style='width:270px;'>
            <source src='songs/".$rowdata["sfile"]."' type='audio/mpeg'>
            </audio>
         
            </div></div>";
            }
}
else
{	
			$qry = "SELECT * FROM song";
			include 'connection.php';
            $result = mysqli_query($con, $qry);
            while ($rowdata = mysqli_fetch_array($result)) 
            {
            echo"<div class='box'>
            
            <img src = 'images/" . $rowdata["simage"] . "'style='width:150px; height:150px;'>
            <div>
            Song-
            <span style='font-size:20px;'>" . $rowdata["sname"] . "</span><br></div>
            
            <audio controls style='width:240px;'>
            <source src='songs/".$rowdata["sfile"]."' type='audio/mpeg'>
            </audio>
         
            </div>";
            }
}
?>


</body>
</html>
<?php
}
else
{
	header("Location:index.php");
}
?>