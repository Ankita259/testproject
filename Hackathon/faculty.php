<?php   
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login_parents.php");  
} else {  
?>  
<!DOCTYPE html>
<html>
<head>
  <title>Faculty</title>
  <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
  <link rel="shortcut icon" href="img/fevicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  


  <style type="text/css">

    body
    {
      background-image: url("img2.jpg"); 
    }
    .upload
    {
      position: relative;
      left:100px;
      border-style: groove;
      border-color: cadetblue;
      border-width: 10px;
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
    <img src="img/vgec.png" style=height:"30px" width="30px">
    <p>Vishwakarma Gov. Engineering College</p>
    </div>
    <div class="right">
    <p>Powered By: The Techsters</p>
    </div>
  </header>
  <upper>
    <ul>
      
      <div class="dropdown">
  <button class="dropbtn">Login</button>
  <div class="dropdown-content">
    <a href="login.php">Student Login</a>
    <a href="login_teacher.php">Faculty Login</a>
    <a href="login_parents.php">Parent Login</a>
  </div>
</div>
      <li><a href="#">Sign Up</a></li>
      <li><a href="#">FAQS</a></li>
    </ul>
  <script type="text/javascript">
    document.getElementByID("1").onclick = function()
    {
      document.getElementByID("1").innerHTML = "Login by Student";
    }
  </script>
  </upper>
  <br><br>






<div class ="upload">
  <p class ="uphead">Upload New Project/Assignment</p>

<input type="file" id="files" name="files[]" multiple />
<output id="list"></output>

<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
</div>

<br><br>
<div class ="upload">

  <p class ="uphead">Review Project/Assignment by Students</p>
  <input id="project" type="text" style="margin: 10px" placeholder="Enrollment no of student" >

</div>
<br><br>
    
<div class="upload">
    <p style="font-style: italic; font-size: 150%"><b>Talk with Students </b> </p>
    <button id="talk" style="margin: 7px"><a href="index.html" >Click here to chat</button>
    
    </div>

</body>
</html> 
<?php  
}  
?>
