<?php
include "hr.php";
include "config.php";
include "function.php";

      echo '<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">';

if ($acp){
	 	echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add Theory Results
							</div>';
	 	echo '<div class="form-group"><form action="submitrst.php?act=theory" method="post">
		  <b>Course Code : </b>
		  <select class="form-control" name="crsid" onChange="getSemid(this.value);" required>
		<option value="">Select Course Code</option>';
		
		$sql1="SELECT courseid,ccode FROM course WHERE ctype = '0'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['courseid']."' >".$rs['ccode']."</option>";
		}
		
		echo '</select>
		
		<b>Student Id : </b>
		  <select class="form-control" id="sid" name="sid" required>
		  <option value="">Select Student Id</option>
		  </select>
		
		 <b>Attendence : </b>
            <input class="form-control" type="number" name="atten" min="0" max="10" size = "35" placeholder="Attendence No [0-10]" >
		  
		 <b>Assignment and Presentation : </b>
           <input class="form-control" type="number" name="assign" min="0" max="10" placeholder="assignment+presentation [0-10]" >
    
		  
		  <b>Class Test : </b>
            <input class="form-control" type="number" name="ctest" min="0" max="10" placeholder="class test [0-10]" >
		  
		  <b>Mid Term : </b>
            <input class="form-control" type="number" name="mid" min="0" max="30" placeholder="Mid Term [0-30]" >
		  
		  <b>Final : </b>
            <input class="form-control" type="number" name="fnal" min="0" max="40" placeholder="Final [0-40]" >
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label>
		  </form></div>';
		  echo '</div></div></div>';
		  
		  
		  
		 echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add Lab Results
							</div>';
		 echo '<div class="form-group"><form action="submitrst.php?act=lab" method="post">
		  
		  <b>Course Code : </b>
		  <select class="form-control" name="crsid" onChange="getlSemid(this.value);" required>
		<option value="">Select Course Code</option>';
		
		$sql1="SELECT courseid,ccode FROM course WHERE ctype = '1'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['courseid']."' >".$rs['ccode']."</option>";
		}
		echo '</select>
		
		<b>Student Id : </b>
		<select class="form-control" id="sidl" name="sid" required>
		  <option value="">Select Student Id</option>
		  </select>
		  
		  <b>Attendence : </b>
            <input class="form-control" type="number" name="atten" min="0" max="10" placeholder="Attendence No [0-10]" >
		  
		  <b>Assesment : </b>
            <input class="form-control" type="number" name="asses" min="0" max="50" placeholder="Lab Assesment [0-50]" >
		  
		  <b>Lab Test : </b>
            <input class="form-control" type="number" name="ltest" min="0" max="40" placeholder="Lab Test [0-40]" >
		  
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label>
		  </form></div>';
		  echo '</div></div></div></div>';
	
	 }
	 
	 
	 else if ($tcp){
	 
	     echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add Theory Results
							</div>';
	 	$a = $_SESSION['tcp'];
        $qq ="SELECT id FROM users WHERE uid = '".$a."'";
	     $results = $con->query($qq);

         while($rs=$results->fetch_assoc())
	    {
	     $tid = $rs['id'];
	    }
	 	echo '<div class="form-group"><form action="submitrst.php?act=theory" method="post">
        <table align="center" width="428" border="0">
		  <select class="form-control" name="crsid" onChange="getSemid(this.value);" required>
		<option value="">Select Course Code</option>';
		
		$sql1="SELECT courseid,ccode FROM course WHERE ctype = '0' && tid = '".$tid."'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['courseid']."' >".$rs['ccode']."</option>";
		}
		
		echo '</select>
		<select class="form-control" id="sid" name="sid" required>
		  <option value="">Select Student Id</option>
		  </select>
		
		  <strong>Attendence : </strong>
		  <input class="form-control" type="text" name="atten" placeholder="Attendence No" >
		  
		  <strong>Assignment and Presentation : </strong>
		  <input class="form-control" type="text" name="assign" placeholder="assignment+presentation" >
		  
		  <strong>Class Test : </strong>
		  <input class="form-control" type="text" name="ctest" placeholder="class test" >
		  
		  <strong>Mid Term : </strong>
		  <input class="form-control" type="text" name="mid" placeholder="Mid Term" >
		  
		  <strong>Final : </strong>
		  <input class="form-control" type="text" name="fnal" placeholder="Final" >
		  
        </table>
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label></div></form>';
		  
		  echo '</div></div></div>';
		  
		  
		  
		echo '<div class="col-md-6">
				<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            Add Lab Results
							</div>';
	 	$a = $_SESSION['tcp'];
        $qq ="SELECT id FROM users WHERE uid = '".$pid."'";
	     $results = $con->query($qq);

         while($rs=$results->fetch_assoc())
	    {
	     $tid = $rs['id'];
	    }
	 	echo '<div class="form-group"><form action="submitrst.php?act=theory" method="post">
        <table align="center" width="428" border="0">
		  <select class="form-control" name="crsid" onChange="getlSemid(this.value);" required>
		<option value="">Select Course Code</option>';
		
		$sql1="SELECT courseid,ccode FROM course WHERE ctype = '1' && tid = '".$tid."'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
		
		echo "<option value='".$rs['courseid']."' >".$rs['ccode']."</option>";
		}
		
		echo '</select>
		<select class="form-control" id="sidl" name="sid" required>
		  <option value="">Select Student Id</option>
		  </select>
		
		  <strong>Attendence : </strong>
		  <input class="form-control" type="text" name="atten" placeholder="Attendence No" >
		  
		  <strong>Assignment and Presentation : </strong>
		  <input class="form-control" type="text" name="assign" placeholder="assignment+presentation" >
		  
		  <strong>Class Test : </strong>
		  <input class="form-control" type="text" name="ctest" placeholder="class test" >
		  
		  <strong>Mid Term : </strong>
		  <input class="form-control" type="text" name="mid" placeholder="Mid Term" >
		  
		  <strong>Final : </strong>
		  <input class="form-control" type="text" name="fnal" placeholder="Final" >
		  
        </table>
        <div align="center">
          <label>
            <input type="submit" value="Submit" />
          </label></div></form>';
		  
		  echo '</div></div></div>';
	
	 }

else {
      echo "<div class ='container'><div class='login'>You are Not Log In<br/><a href='/sdb/login.php'>Click Here to Login !!!</a></div></div>";
     }

include "fr.php";

?>