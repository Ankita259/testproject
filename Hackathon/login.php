<!doctype html>  
<html>  
<head>  
<title>Login</title>  
    <style>   
     body
    {       
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
}  
      h3 {  
    color: indigo;  
    font-family: verdana;  
} 
  input[type=text],center, select, textarea
  {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  }
  input[type=password],center, select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  }
  input[type=submit],center, select, textarea{
  font-size: 20px;
  }
</style>  
</head>  
<body>  
     <center><h1>Login</h1>
     <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
     <h3>Login Form</h3> 
     </center> 
     <form action="" method="POST">  
Enroll: <input type="text" name="enroll"><br />  
Password: <input type="password" name="pass"><br /> 
<center><input type="submit" value="Login" name="submit" /></center>
</form>  
<?php  
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST["submit"])){  
  
if(!empty($_POST['enroll']) && !empty($_POST['pass'])) {  
    $enroll=$_POST['enroll'];  
    $pass=$_POST['pass'];  
  
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('user_registration') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM login WHERE enrollment='".$enroll."' AND password='".$pass."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysql_fetch_assoc($query))  
    {  
    $dbenrollment=$row['enrollment'];  
    $dbpassword=$row['password'];  
    }  
  
    if($enroll == $dbenrollment && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$enroll;  
  
    /* Redirect browser */  
    header("Location:student.php");  
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