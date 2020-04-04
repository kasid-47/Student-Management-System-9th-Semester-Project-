<head><link rel="stylesheet" href="http://localhost/sdb/assets/css/login.css" type="text/css"/>
</head>
<?php
ob_start();
session_start();
$acp = isset($_SESSION['acp']);
$tcp = isset($_SESSION['tcp']);
$scp = isset($_SESSION['scp']);
include "config.php";


 require('config.php');
 echo '<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if (isset($_POST['userid']) and isset($_POST['password'])){

$userid = $_POST['userid'];
$password = $_POST['password'];
$pass2 = md5($password);

$query = "SELECT * FROM `users` WHERE uid='$userid' and pass='$pass2'";
 
$result = mysqli_query($con,$query) or die(mysql_error($con));
$rs= mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if ($count == 1 && $rs['utype']=="1"){
$_SESSION['acp'] = $userid;
}
else if($count == 1 && $rs['utype']=="2"){
$_SESSION['tcp'] = $userid;
}
else if($count == 1 && $rs['utype']=="3"){
$_SESSION['scp'] = $userid;
}
else{

$fmsg = "Userid OR Password is Invalid.";
}
}

if (isset($_SESSION['scp']) || isset($_SESSION['tcp']) || isset($_SESSION['acp'])){
header("Location: /sdb/profile.php");
}
else{

echo '<html>
<section class="container">
<div class="login">
      <form class="form-signin" method="POST">
        <h1>Please Login</h1>
	  <p><input type="text" name="userid" placeholder="Userid" required></p>
      <p><input type="password" name="password" placeholder="Password" required></p>
        <p class="submit"><input type="submit" value="Login"></p><br/>';
      if(isset($fmsg)){
	  echo '<h1>';
	  echo $fmsg;
	  echo '</h1>';
       }
echo '</form>
</div>
<div class="container"><div class="login" align="center"><a href="/sdb">[Home]</a></div></div>
</section>';

}
echo '
</body>
</html>
';
?>
