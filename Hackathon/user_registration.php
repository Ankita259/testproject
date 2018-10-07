<!DOCTYPE html>
<html>
<body>

<?php
    
$con=mysql_connect('localhost','root','') or die(mysql_error());  
mysql_select_db('user_registration') or die("cannot select DB");  
  
$query=mysql_query("SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
$numrows=mysql_num_rows($query);  
if($numrows!=0)  
{  
    while($row=mysql_fetch_assoc($query))  
    {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];
        echo "<br> username: ". $row['username']. " - password: ". $row['password']. "<br>";
    }
}
else
{
    echo "0 results";
}

?> 

</body>
</html>