
<!doctype html>  
<html>  
<head>  
<title>Login</title>  
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h3 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
} </style>  
</head>  
<body>  
     <center><h1>Login</h1></center>  
   <p><a href="teacher_register.php">Register</a> | <a href="login_teacher.php">Login</a></p>  
<h3>Login Form</h3>  
<form action="" method="POST">  
faculty_id: <input type="text" name="id"><br />  
enroll: <input type="text" name="enroll"><br />  
sub_id: <input type="text" name="sid"><br />  
faculty_password: <input type="password" name="pass"><br />   
<input type="submit" value="Login" name="submit" />  
</form>  
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST["submit"])){
if(!empty($_POST['id']) && !empty($_POST['enroll']) && !empty($_POST['sid']) &&  !empty($_POST['pass'])) {  
    $id=$_POST['id'];
    $enroll=$_POST['enroll'];  
    $sid=$_POST['sid'];
    $pass=$_POST['pass'];  
  
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('user_registration') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM login_teacher WHERE faculty_id='".$id."'AND enrollment='".$enroll."' AND  sub_id='".$sid."' AND faculty_password='".$pass."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysql_fetch_assoc($query))  
    {  
    $dbfaculty_id=$row['faculty_id'];
    $dbenrollment =$row['enrollment'];  
    $dbsub_id=$row['sub_id'];
    $dbfaculty_password =$row['faculty_password'];  
    }  
  
    if($id == $dbfaculty_id &&  $enroll == $dbenrollment && $sid == $dbsub_id && $pass == $dbfaculty_password)  
    {  
    session_start();  
    $_SESSION['sess_user2']=$id;  
  
    /* Redirect browser */  
    header("Location:faculty.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html> 
