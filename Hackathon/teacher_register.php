<!doctype html>  
<html>  
<head>  
<title>Register</title>  
    <style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
}  
         h2 {  
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
   margin-top: 20px; 
  font-size: 20px;
  }
</style>  
</head>  
<body>  
     
    <center><h1>Registration</h1></center>  
        <p><a href="teacher_register.php">Register</a> | <a href="login_teacher.php">Login</a></p>  
    <center><h2>Faculty registration Form</h2></center>  
<form action="" method="POST">  
    <legend>  
    <fieldset>  
faculty_id: <input type="text" name="id"><br />  
faculty_name: <input type="text" name="name"><br />  
enroll: <input type="text" name="enroll"><br />  
sub_id <input type="text" name="sid"><br />  
faculty_password: <input type="password" name="pass"><br />        
<input type="submit" value="Register" name="submit" />  
              
        </fieldset>  
        </legend>  
</form>  
<?php  
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST["submit"])){  
if(!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['enroll']) && !empty($_POST['sid']) && !empty($_POST['pass'])) {  
    $id=$_POST['id'];
    $name=$_POST['name'];
    $enroll=$_POST['enroll'];
    $sid=$_POST['sid'];  
    $pass=$_POST['pass'];  
    $con=mysql_connect('localhost','root','') or die(mysql_error());  
    mysql_select_db('user_registration') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM login_teacher WHERE faculty_id='".$id."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows==0)  
    {  
  $sql="INSERT INTO login_teacher (faculty_id,faculty_name,enrollment,sub_id,faculty_password) VALUES('$id','$name','$enroll','$sid','$pass')";
    $result=mysql_query($sql);  
    if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>
