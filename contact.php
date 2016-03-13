<!DOCTYPE html>
<html>
<head>
<title> Metresponse - Contact </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="icon" type="image/jpg" href="img/iconmet.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/formvalid.js" type="text/javascript"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73334339-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<style>

</style>

<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="index.html"><img src="img/Met-Logo.jpg"  class="line" alt="company logo" id="iconheader" ></a>
    </div>

     <div class="collapse navbar-collapse" id="myNavbar">
      <ul   class="nav navbar-nav navbar-right">
            <li ><a  href="index.html">Home</a></li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Metresponse
             <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li><a  href="science.html">Science</a></li>
                  <li><a  href="index.html#team">Our Team</a></li>
                  </ul>
            </li>
            <li><a  href="services.html">Services</a></li>
            <li><a   href="contact.php">Contact Us</a></li>
      </ul>
</div>
</div>

</nav>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $whereErr = $positionErr = $commErr = "";
$name = $email = $where = $comment = $position = "";
$result="";
$flag="0";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Full name is required."; $flag="1";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; $flag="1";
     }
   }

   if (empty($_POST["email"])) {
     $emailErr = "Email is required";$flag="1";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; $flag="1";
     }
   }

  if (empty($_POST["position"])) {
     $positionErr= "Your Position is required.";$flag="1";
   } else {
     $position = test_input($_POST["position"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$position)) {
       $positionErr = "Only letters and white space allowed"; $flag="1";
     }
   }


    if (empty($_POST["where"])) {
     $whereErr = "Your company or university name is required.";$flag="1";
   } else {
     $where = test_input($_POST["where"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$where)) {
       $whereErr = "Only letters and white space allowed"; $flag="1";
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }





if($flag=="0")
   {

     $name = $_POST["name"];
$email = $_POST["email"];
$where=$_POST["where"];
$position=$_POST["position"];
$comment=$_POST["comment"];

//echo $email." ".$name ." ".$where." ".$position." ".$comment;

$path="message/".$name."_ ".$where. ".txt";
  $file = fopen($path, "w");
                      fwrite($file,"name   -   email address -     Position    -   university/company   "."\r\n");
                      fwrite($file, $name." - ".$email." - ".$position." - ".$where." - "."\r\n");
					  fwrite($file,$comment."\r\n");
  fclose($file);

   $result=" Great! We will get back to you soon.";
   }


}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

  <style>
.error {color: #4D0000;}
.note {color: #3CB371;}
.cform {margin-top:100px; min-height:700px;}
</style>

<div id="contact" class="container cform">

    <h2 style="margin:60px 0px  20px 0px;">We are here to help!</h2>
    <p align="left">You can reach us by sending an email to <strong> info@metresponse.net </strong> </p>
	<p>or fill out the form below and we will get back to you. Please let us know how we can help you in the comment section. Thanks!<br/></p>

<div id="resform" class="col-md-offset-3 col-md-6" >


  	<span class="note">
<?php

echo $result;

?>  </span><!-- show error -->
 <iframe style="display:none;" name="blanckw"></iframe>


<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="error"> <?php echo $nameErr;?></span>
  <input  type="text" class="form-control"  name="name" id="name" placeholder="Your Full Name"  >
<span class="error"> <?php echo $emailErr;?></span>
  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email"  >
<span class="error"><?php echo $whereErr;?></span>
  <input type="text" class="form-control" name="where" id="where" placeholder="Company/University" >
 <span class="error"><?php echo $positionErr;?></span>
  <input type="text" class="form-control" name="position" id="position" placeholder="Position " >
<span class="error"><?php echo $commErr;?></span>
 <textarea type="text" class="form-control" rows="5"  name="comment" id="comment" placeholder="How can we help you?"  ></textarea>
    <input type="submit" name="submit" value="Send">





</form>


</div>
</div>


<footer   id="copyright">

<div class="row">
<div class="col-md-4">
<div  class="footerlinks">
  <span style="color:#EBF0F5;">
 <a href="index.html">Home</a> <span>-</span>
 <a href="services.html">Services</a><span>-</span>
 <a href="science.html">Science</a>
 </span> <br />
 <span >
 <a  class="soc  fa fa-linkedin" href="https://www.linkedin.com/company/metresponse-llc" style="font-size:20px;padding-top:5px; " target="blanck"> </a>
 <a  class="soc" href="contact.php" ><span class="fa fa-envelope-o" style="font-size:20px; padding-top:10px;"></span> </a><br/>
 </span>
 </div>
 </div>
<div class="col-md-4">
<p  class="women">*Women Owned Consulting Services*<p/>
<div>Copyright &copy; 2013 - <span id="timestamp"></span> <br /> MetResponse LLC - All rights reserved.</div>
</div>

<div class="col-md-4">

<img  src="img/Met-Logo1.png" style="width:180px;height:150px;">

</div>
</div>
<script src="js/time.js"></script>
</footer>
<script src="js/time.js"></script>


</body>
</html>
