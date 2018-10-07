<?php   
session_start();  
if(!isset($_SESSION["sess_user1"])){  
    header("location:login_parents.php");  
} else {  
?>  
<!DOCTYPE html>
<html>
<head>
	<title>Parent</title>
	
    <link rel="shortcut icon" href="Project/img/fevicon.ico">
    <link rel="stylesheet" type="text/css" href="Project/css/style.css">
  	
<style type="text/css">
      body
		{
			background-image: url("background3.jpg"); 
		}

    a
    {
      color: Black;
    }

		 .upload
        {
            position: relative;
            left:100px;
            border-style: groove;
            border-color: cadetblue;
            border-width: 5px;
            width:75%;
            top: 100px;
        }
        .uphead
        {
            font-family: 'Patua One', cursive;
            font-size: 150%;
            padding-left: 10px;
        }
	</style>
</head>
<body>
   <header>
<div class="left">
    <img src="Project/img/vgec.png" style=height:"30px" width="30px">
    <p>Vishwakarma Gov. Engineering College</p>
    </div>
    <div class="right">
    <p>Powered By: The Techsters</p>
    </div>
  </header>
  <upper>
    <ul>
      <button id="1">Login</button>

      <li><a href="#">Sign Up</a></li>
      <li><a href="#">FAQS</a></li>
    </ul>
  </upper>
  <br><br>




<form action="parent.php" method="post" enctype="multipart/form-data">
<div class="upload">

    <p class ="uphead" >Feedback:</p>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$user=$_SESSION["sess_user1"] ;
 $con=mysql_connect('localhost','root','') or die(mysql_error());  
mysql_select_db('user_registration') or die("cannot select DB");
$sql = "SELECT comments FROM result  WHERE enrollment=(SELECT enrollment FROM login_parents WHERE parents_id='".$user."' ) ";
$results = mysql_query($sql);
while($row=mysql_fetch_assoc($results))
    {
        echo" ";?> <?php echo $row['comments']; ?>  <?php echo " ";
    }
?>
    
 
</div>

<div class="upload">

    <p class ="uphead" >Result</p>
    
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

        $sql = "SELECT assign_marks,blog_points FROM result  WHERE enrollment=(SELECT enrollment FROM login_parents WHERE parents_id='".$user."' )";
        $results = mysql_query($sql);
        while($row=mysql_fetch_assoc($results))
        {
            echo" ";?> <?php echo $row['assign_marks'] + $row['blog_points']; ?>  <?php echo " ";
        }
    
?>
</div>

<div class="upload">

    <p class ="uphead" >Progress graph</p>
    
 
<input type="submit" name="btn3" value="Show"/>
</div>



<div class="upload">
    <p style="font-style: italic; font-size: 150%"><b>Ask the faculties </b> </p>
    <button id="talk" style="margin: 7px"><a href="chat.html" >Click here to chat</button>
    
 </div>
</form>
  


</body>
</html>
<?php  
}  
?>