<?php
include "hr.php";
include "function.php";

  echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';


if ($acp||$tcp){

	 /* ===============================Theory Result Start=============================== */
  if($_GET['act'] == 'theory') {

     $crsid=$_REQUEST['crsid'];
	 $sid=$_REQUEST['sid'];
	 $atten=$_REQUEST['atten'];
	 $assign=$_REQUEST['assign'];
	 $ctest=$_REQUEST['ctest'];
	 $mid=$_REQUEST['mid'];
	 $fnal=$_REQUEST['fnal'];
	 
	 
	 $query ="SELECT * FROM tresults WHERE sid = '".$sid."' && crsid = '".$crsid."'";
	 $rs = mysqli_query($con,$query);
     $dup = mysqli_num_rows($rs);
	 
	 /* ===============================Duplicate Check Start=============================== */
	 
	 if($dup>0){
	 echo "<div class='content' align='center'>This Student Result Already Added!</div>";
	 return 0;
	 }
	 
	 /* ===============================Duplicate Check End=============================== */
	 
	 $query ="SELECT semid FROM course WHERE courseid = '".$crsid."'";
	$results = $con->query($query);

     while($rs=$results->fetch_assoc())
	 {
	 $semid = $rs['semid'];
     }
	 
	 $tresult = $atten + $assign + $ctest + $mid + $fnal;
	 
	 $acredit = getCredit($tresult,$crsid);
	 
	 $point = getPoint($tresult);
	 $grade = getGrade($tresult);
	 
	  $query="INSERT INTO tresults (crsid, sid, semid, atten, assign, ctest, mid, fnal, acredit, GPA, grade) values('".$crsid."','".$sid."', '".$semid."', '".$atten."', '".$assign."', '".$ctest."', '".$mid."', '".$fnal."', '".$acredit."', '".$point."', '".$grade."')";
	  if(!mysqli_query($con,$query))
	  {
	  die ("An unexpected error occured while saving the record, Please try again!");
	   }
      else
	  {
	  echo "<div class='content' align='center'>Result Successfully Added!</div>";
	  }
		  
		  
		  /* ===========================================Semester Increment Start============================================= */
		  
	  $d = 0;
	  $count2 = 0;
      $count3 = 0;
	  $query="SELECT * FROM course WHERE semid='".$semid."'";
	  $resource=mysqli_query($con,$query);
      $count = mysqli_num_rows($resource);	  
      while($result=mysqli_fetch_array($resource))
	   {
	     $a = $result['courseid'];
	        
		 $qr="SELECT * FROM tresults WHERE sid='".$sid."' && crsid='".$a."'";
		 $rs=mysqli_query($con,$qr);
		 $cnt2 = mysqli_num_rows($rs);
		 $count2 = $count2 + $cnt2;
		 while($rt=mysqli_fetch_array($rs))
	      {
	       $b = $rt['acredit'];
	       $f = $rt['fnal'];
	       if($b==0||$f==0){
	       $d = 1;
	       $h = 0;
	       break;
	       }
		   else if($b>0&&$f>0){
	       $h = 1;
	       }
	      }
		  
	     if($d==1){
	     break;
	     }
	 
	      $qrr="SELECT * FROM lresults WHERE sid='".$sid."' && crsid='".$a."'";
		  $rss=mysqli_query($con,$qrr);
		  $cnt3 = mysqli_num_rows($rss);
		  $count3 = $count3 + $cnt3;
		  while($rtt=mysqli_fetch_array($rss))
	       {
	        $c = $rtt['acredit'];
	        $m = $rtt['ltest'];
	        if($c==0||$m==0){
	        $d = 1;
	        $h = 0;
	        break;
	        }
	        else if($c>0&&$m>0){
	        $h = 1;
	        }
	       }
	 
	      if($d==1){
	      break;
	      }
        }
  
       $tcount = $count2 + $count3;
       if($h==1 && $tcount==$count){
       $query="SELECT * FROM crsemester WHERE sid = '".$sid."'";
	   $resource=mysqli_query($con,$query);
	   $result=mysqli_fetch_array($resource);
	   $z = $result['crsemid'] + 1;
	   
	   $qzr="UPDATE crsemester SET crsemid='".$z."' WHERE sid='".$sid."'";
	   mysqli_query($con,$qzr);
	   }  
		  
		      
		 /* ===========================================Semester Increment End============================================= */
		  
		
	
	echo "<div align='center'><a href='addrst.php'>[Add Another Result]</a></div>";
	
	 }
	 
	 /* ===============================Theory Result End=============================== */
	 
	 
	 
	 /* ===============================Lab Result Start=============================== */
	 
	 if($_GET['act'] == 'lab') {
	 
	 
	 
	 $crsid=$_REQUEST['crsid'];
	 $sid=$_REQUEST['sid'];
	 $atten=$_REQUEST['atten'];
	 $asses=$_REQUEST['asses'];
	 $ltest=$_REQUEST['ltest'];
	 
	 
	 $query ="SELECT * FROM lresults WHERE sid = '".$sid."' && crsid = '".$crsid."'";
	 $rs = mysqli_query($con,$query);
     $dup = mysqli_num_rows($rs);
	 
	 if($dup>0){
	 echo "<div class='content' align='center'>This Student Result Already Added!</div>";
	 return 0;
	 }
	 
	 
	 
	 $query ="SELECT semid FROM course WHERE courseid = '".$crsid."'";
	$results = $con->query($query);

    while($rs=$results->fetch_assoc())
	 {
	 $semid = $rs['semid'];
     }
	 
	 $tresult = $atten + $asses + $ltest;
	 
	 $acredit = getCredit($tresult,$crsid);
	 
	 $point = getPoint($tresult);
	 $grade = getGrade($tresult);
	 
	 $query="INSERT INTO lresults (sid, semid, crsid, atten, asses, ltest, acredit, GPA, grade) values('".$sid."', '".$semid."', '".$crsid."', '".$atten."', '".$asses."', '".$ltest."', '".$acredit."', '".$point."', '".$grade."')";
		
		  if(!mysqli_query($con,$query))
		  {
		  die ("An unexpected error occured while saving the record, Please try again!");
		  }
		  else
		 {
		  echo "<div class='content' align='center'>Result Successfully Added!</div>";
		  }
	
	
	/* ===========================================Semester Increment Start============================================= */
		  
	  $d = 0;
	  $count2 = 0;
      $count3 = 0;
	  $query="SELECT * FROM course WHERE semid='".$semid."'";
	  $resource=mysqli_query($con,$query);
      $count = mysqli_num_rows($resource);	  
      while($result=mysqli_fetch_array($resource))
	   {
	     $a = $result['courseid'];
	        
		 $qr="SELECT * FROM tresults WHERE sid='".$sid."' && crsid='".$a."'";
		 $rs=mysqli_query($con,$qr);
		 $cnt2 = mysqli_num_rows($rs);
		 $count2 = $count2 + $cnt2;
		 while($rt=mysqli_fetch_array($rs))
	      {
	       $b = $rt['acredit'];
	       $f = $rt['fnal'];
	       if($b==0||$f==0){
	       $d = 1;
	       $h = 0;
	       break;
	       }
		   else if($b>0&&$f>0){
	       $h = 1;
	       }
	      }
		  
	     if($d==1){
	     break;
	     }
	 
	      $qrr="SELECT * FROM lresults WHERE sid='".$sid."' && crsid='".$a."'";
		  $rss=mysqli_query($con,$qrr);
		  $cnt3 = mysqli_num_rows($rss);
		  $count3 = $count3 + $cnt3;
		  while($rtt=mysqli_fetch_array($rss))
	       {
	        $c = $rtt['acredit'];
	        $m = $rtt['ltest'];
	        if($c==0||$m==0){
	        $d = 1;
	        $h = 0;
	        break;
	        }
	        else if($c>0&&$m>0){
	        $h = 1;
	        }
	       }
	 
	      if($d==1){
	      break;
	      }
        }
  
       $tcount = $count2 + $count3;
       if($h==1 && $tcount==$count){
       $query="SELECT * FROM crsemester WHERE sid = '".$sid."'";
	   $resource=mysqli_query($con,$query);
	   $result=mysqli_fetch_array($resource);
	   $z = $result['crsemid'] + 1;
	   
	   $qzr="UPDATE crsemester SET crsemid='".$z."' WHERE sid='".$sid."'";
	   mysqli_query($con,$qzr);
	   }  
		  
		      
		 /* ===========================================Semester Increment End============================================= */
		  
	
	
	echo "<div align='center'><a href='addrst.php'>[Add Another Result]</a></div>";
	 
	 
	 }
	 
	 /* ===============================Lab Result End=============================== */
  }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>