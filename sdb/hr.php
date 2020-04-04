<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Control Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php
ob_start();
session_start();
$acp = isset($_SESSION['acp']);
$tcp = isset($_SESSION['tcp']);
$scp = isset($_SESSION['scp']);
include "config.php";
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
    <?php
         if($acp)
             $pid = $_SESSION['acp'];
    else if($tcp)
             $pid = $_SESSION['tcp'];
    else
             $pid = $_SESSION['scp'];
               $qr="SELECT uid,name FROM users Where uid=".$pid."";
		         $rs=mysqli_query($con,$qr);
			      $rst=mysqli_fetch_array($rs);
			  echo '<a class="navbar-brand" href="index.php">'.$rst["name"].'</a>
            </div>';
?>
  <?php
  if ($acp||$tcp||$scp){
  echo '<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>';
}
else{
echo '<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="login.php" class="btn btn-danger square-btn-adjust">Login</a> </div>';
}
?>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					<?php echo'<div style="color: white;">Id : '.$rst["uid"].'</div>'; ?></li>
					
                   <?php
				    if($acp){
				   ?>
				   <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Profile</a>
                    </li>
                      <li>
                        <a  href="insert.php"><i class="fa fa-desktop fa-3x"></i> Accounts</a>
                    </li>
					       <li  >
                        <a  href="addcrs.php"><i class="fa fa-edit fa-3x"></i> Courses </a>
                    </li>	
					       <li  >
                        <a  href="addbth.php"><i class="fa fa-bar-chart-o fa-3x"></i> Batches</a>
                    </li>	
					       <li  >
                        <a  href="addsemid.php"><i class="fa fa-bar-chart-o fa-3x"></i> Semesters</a>
                    </li>
					       <li  >
                        <a  href="complaint.php"><i class="fa fa-bar-chart-o fa-3x"></i> Complaint Box</a>
                    </li>	
					       <li  >
                        <a  href="addrst.php"><i class="fa fa-edit fa-3x"></i> Add Results </a>
                    </li>	
						   
                      <li  >
                        <a  href="result.php"><i class="fa fa-table fa-3x"></i> Show Results</a>
                    </li>
					<?php
				    }
					else if($tcp){
				   ?>
				   <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Profile</a>
                    </li>
                      
					       <li  >
                        <a  href="addrst.php"><i class="fa fa-edit fa-3x"></i> Add Results </a>
                    </li>	
						   
                      <li  >
                        <a  href="result.php"><i class="fa fa-table fa-3x"></i> Show Results</a>
                    </li>
					
					  <li  >
                        <a  href="complaint.php"><i class="fa fa-bar-chart-o fa-3x"></i> Complaint Box</a>
                    </li>	
					<?php
				    }
                    else{
				   ?>
				   				   <li>
                        <a  href="profile.php"><i class="fa fa-qrcode fa-3x"></i> Profile</a>
                    </li>
						   
                      <li  >
                        <a  href="result.php"><i class="fa fa-table fa-3x"></i> Show Results</a>
                    </li>
					    <li  >
                        <a  href="complaint.php"><i class="fa fa-bar-chart-o fa-3x"></i> Complaint Box</a>
                    </li>	
				   <?php
				    }
				   ?>
                </ul>
               
            </div>
            
        </nav>  