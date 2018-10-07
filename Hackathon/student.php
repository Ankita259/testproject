<?php  
error_reporting(E_ALL ^ E_DEPRECATED); 
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
    <link rel="shortcut icon" href="Project/img/fevicon.ico">
    <link rel="stylesheet" type="text/css" href="Project/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
    <style type="text/css">

        body
        {
            background-image: url("Backgroundimg.jpg"); 
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
        #files
        {
            padding-left: 10px;
            position: relative;
            margin: 10px;
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


<form action="student.php" method="post" enctype="multipart/form-data">
<div class="upload"  >
    <p class ="uphead" >Upload Completed Project/Assignment</p>
     <input type="file" id="file1" name="userfile"/>
Enter subject code: <input type="text" id="subcode" name="subcode"/>
<input type="submit" name="btn" value="submit"/>
</div>


</form>

<br><br>
<form action="student.php" method="post" enctype="multipart/form-data">
<div class="upload">

    <p class ="uphead" >Upload Your Interesting ideas</p>
    <input type="file" id="file2" name="userfile2"/>
Enter subject code: <input type="text" id="subcode2" name="subcode2"/>
<input type="submit" name="btn1" value="submit"/>
</div>
</form>
   

<p class ="uphead" style="position: relative;left: 100px; top: 100px;" >Grade Points : 
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$user=$_SESSION["sess_user"] ;
 $con=mysql_connect('localhost','root','') or die(mysql_error());  
mysql_select_db('user_registration') or die("cannot select DB");
$sql = "SELECT blog_points FROM result WHERE enrollment='".$user."'";
$results = mysql_query ($sql) ;
while ($row = mysql_fetch_assoc($results)){

      echo $row ['blog_points'];
}
?>
</p>
<br>

<div class="upload">
    <a style="color: black" href=""><h2>Click here to open online test</h2></a>
</div>
<br><br>
<div class="upload">
    <p style="font-style: italic; font-size: 150%"><b>Ask the faculties </b> </p>
    <button id="talk" style="margin: 7px"><a href="chat.html" >Click here to chat</button>
    
 </div>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
        if(isset($_POST["btn"]) && $_FILES['userfile']['size'] > 0)
        {
            if(!empty($_POST['subcode']))
            {
                $fileName = $_FILES['userfile']['name'];
                $tmpName  = $_FILES['userfile']['tmp_name'];
                $fileSize = $_FILES['userfile']['size'];
                $fileType = $_FILES['userfile']['type'];
                 $subcode=$_POST['subcode'];  
                  $user=$_SESSION["sess_user"] ;

                  $fp= fopen($tmpName, 'r');
                                $content = fread($fp, filesize($tmpName));
                                $content = addslashes($content);
                                fclose($fp);

                                if(!get_magic_quotes_gpc())
                                {
                                    $fileName = addslashes($fileName);
                                }
                           


                     $con=mysql_connect('localhost','root','') or die(mysql_error());  
                     mysql_select_db('user_registration') or die("cannot select DB");  

                     $sql="INSERT INTO assign_project(assignment,sub_id,enrollment) VALUES('$fileName','$subcode','$user')"; 
                     $result=mysql_query($sql);  
        if($result)
        {  ?>
        <script>alert('uploaded');</script>
    <?php
} 
    else {   ?>
        <script>alert('Failed');</script>
    <?php
      
    }  
            }
        }

?>
<?php
        if(isset($_POST["btn1"]) && $_FILES['userfile2']['size'] > 0)
        {
            if(!empty($_POST['subcode2']))
            {
                $fileName = $_FILES['userfile2']['name'];
                $tmpName  = $_FILES['userfile2']['tmp_name'];
                $fileSize = $_FILES['userfile2']['size'];
                $fileType = $_FILES['userfile2']['type'];
                 $subcode=$_POST['subcode2'];  
                  $user=$_SESSION["sess_user"] ;

                  $fp= fopen($tmpName, 'r');
                                $content = fread($fp, filesize($tmpName));
                                $content = addslashes($content);
                                fclose($fp);

                                if(!get_magic_quotes_gpc())
                                {
                                    $fileName = addslashes($fileName);
                                }
                           
                            include 'library/config.php';
include 'library/opendb.php';

                     $con=mysql_connect('localhost','root','') or die(mysql_error());  
                     mysql_select_db('user_registration') or die("cannot select DB");  

                     $sql="INSERT INTO blog(enroll,sub_id,blog) VALUES('$user','$subcode','$fileName')"; 
                     $result=mysql_query($sql);  
        if($result)
        {  ?>
        <script>alert('uploaded');</script>
    <?php
} 
    else {   ?>
        <script>alert('Failed');</script>
    <?php
      
    }  
            }
        }

?>


</body>
</html>
<?php  
}  
?>