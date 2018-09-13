<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_pm.php";
echo '<div class="font">';
?>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dpxyz" ).datepicker();
            $( "#dpxyz" ).datepicker("show");
         });
		$(function() {
            $( "#dpxyz" ).datepicker();
            $( "#dpxyz" ).datepicker("show");
         });
      </script>
      
<?php
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}

require_once "database.php";

$status=0;
?>


<!DOCTYPE html>
<html>
<head>
<title>Res_Request</title>

</head>

    <body>
    
    	<br><br><br><br><br>
	<center>
		<h2>Request Resource</h2>
        <form method="get" onsubmit="ShowLoading()">
        <table border="1" class="t4" style="margin-top: -2%;">
        <tr><th colspan="2" align="left">List Of Projects</th></tr> 
		<tr><td>Select Project
		&nbsp;<select name="proj_id" class="textbox"><option value="">Select Value</option>
		<?php 
		$qry=mysqli_query($con,"select * from tbl_sow where bproj_status!='0' and vchpm='$_SESSION[userid]' order by vchproject_name ");
		if($qry)
		{
			while($row1=mysqli_fetch_array($qry))
			{
				?>
				<option value="<?php echo $row1['vchproject_id']; ?>" <?php if(isset($_GET['proj_id'])){if($_GET['proj_id']==$row1['vchproject_id']){echo "selected";}} ?> > <?php echo $row1['vchproject_id'].' | '.$row1['vchproject_name']; ?> </option>
				<?php
			}
		}
		?>
		</select></td></tr>
       <br><br> <tr><td><input type="submit" name="btnsow" value="Request From SOW" class="b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="btnnew" value="Additional Request" class="b"></td></tr>
		</table>
        </form>
        <?php
        if (isset($_GET['btnnew']) && $_GET['proj_id']!='') {
			$_SESSION['projid']=$_GET['proj_id'];
          echo "<script>window.location.href='sow_req2.php';</script>";
    }
	
    ?>
<br><br>
<?php
	if(isset($_GET['btnsow']) && $_GET['proj_id']!='' && $_GET['proj_id']!='')
	{
	$_SESSION['projid']=$_GET['proj_id'];
		echo "<form method='post' name='sow1'><table class='t3'>";
		
		
		$qrysub=mysqli_query($con,"select * from tbl_resource_allocation where vchproject_id='$_GET[proj_id]' and bsowreq='1' and bsaved_status='1' and allocated_emp_id='' and vchskill_id='' and req_from='' order by vchproject_id");
		if($qrysub)
		{
if(mysqli_num_rows($qrysub)>0)
{
echo "<tr><th>Designation</th><th>Allocation%</th><th>Billing Type</th><th>Start Date</th><th>End Date</th><th>Action</th></tr>";
			while($rsow=mysqli_fetch_array($qrysub))
			{
				echo "<tr>";
				$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$rsow[vchdesignation_id]'");
				$rdes=mysqli_fetch_array($qrydes);
				echo "<td>$rdes[vchdesignation_name]</td>";
				echo "<td>$rsow[fper_allocation_req]</td>";
				echo "<td>";
                                if($row1['b_bill_status']==1)
                                {
	                             echo "Billable";
                                }
                                else
                                {
 	                             if($row1['bnonbill_status']==0)
	                             {
		                          echo "ANBI";
	                             }
	                             elseif($row1['bnonbill_status']==1)
	                             {
		                          echo "ANBC";
	                             }
	                             else
	                             {
		                          echo "Nonbillable";
	                             }
                                }
				echo "</td>";
				echo "<td>$rsow[dresource_startdate]</td>";
				echo "<td>$rsow[dresource_enddate]</td>";
				 ?>
	            <td><a href="res_request.php?srid=<?php echo $rsow['Srno']; ?>" ><input type="button" class="button" value="Request"></a></td>
	            <?php echo "</tr>";
			}
}
else
{
echo "<p class='error'>No record for this request</p>";
}
		}
		
	}

?>
</table></form>
</center>   
</body>
</html>

<?php
if(isset($_GET['srid']))
{
	$_SESSION['projid']=$_GET['proj_id'];
		$qrysr=mysqli_query($con,"update tbl_resource_allocation set req_from='$_SESSION[userid]',bsaved_status='-1' where Srno='$_GET[srid]'");
		if($qrysr)
		{
			
			echo "<script type='text/javascript'>";
			echo "alert('Resource requested successfully....')";
			echo "</script>"; 
			echo "<script>window.location.href='res_request.php';</script>";
		}
		
}
?>
<?php
if (isset($_POST['formsubmit'])) 
{
    $proj_id = $_GET['proj_id'];
    $seldes = $_POST['seldes'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $bill = $_POST['bill'];
    $skill = $_POST['skill'];
    $alloc = $_POST['alloc'];

	if($_POST["date2"] < $_POST["date1"])
	{
		$status=1;
		echo "<center class=error>Select valid End Date</center>";
	}
	if($status==0)
	{
			$q=mysqli_query($con,"select dsow_endDate from tbl_sow where vchproject_id='$proj_id' ");
			$r=mysqli_fetch_array($q);
			if($date2 > $r['dsow_endDate'])
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource End date should not be greater than Project End date')";
				echo "</script>"; 
			}
			else
			{
				$insert = "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startDate,dresource_endDate,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsaved_status) values ('$proj_id','$seldes','$date1','$date2','$bill','$skill','$alloc','$_SESSION[userid]','','1')";
				$result = mysqli_query($con, $insert);
				if ($result) 
				{
					//$q=mysqli_query($con,"insert into tbl_res_request (vchproj_id,ino_of_req,ires_served,ires_denied,bres_status) values ('$proj_id','0','','','0') ");
					$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='E1' ");
	$qry=mysqli_query($con,"select * from tbl_emp where vchemp_id='E1' ");
	while($row=mysqli_fetch_array($qry))
	{
		$qry2=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj_id' ");
		while($row2=mysqli_fetch_array($qry2))
		{
			$qry3=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
			while($row3=mysqli_fetch_array($qry3))
			{
				$webmaster_email = "infostretch@mail.com";
				$feedback_page = "error_message.html";
				$error_page = "error_message.html";
				$rdirect="res_allocation.php";
				
				$email1= $row['vchemail'];
				
				$body = "Hello " . $row['vchemp_Fname'] ." ". $row['vchemp_Lname'] . "
You have received the Resource Request for Project " . $row2['vchproject_name'] . " form " . $row3['vchemp_Fname'] . " " . $row3['vchemp_Lname'] .".";

				/*
				The following function checks for email injection.
				Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
				*/
				function isInjected($str) {
					$injections = array('(\n+)',
					'(\r+)',
					'(\t+)',
					'(%0A+)',
					'(%0D+)',
					'(%08+)',
					'(%09+)'
					);
					$inject = join('|', $injections);
					$inject = "/$inject/i";
					if(preg_match($inject,$str)) {
						return true;
					}
					else {
						return false;
					}
				}

				// If the user tries to access this script directly, redirect them to the feedback form,

				// If the form fields are empty, redirect to the error page.
				if (empty($email1) || empty($body)) {
					header( "Location: $error_page" );
				}

				// If email injection is detected, redirect to the error page.
				elseif ( isInjected($email1) ) {
					header( "Location: $error_page" );
				}

				// If we passed all previous tests, send the email then redirect to the thank you page.
				else {
					mail( "$email1", "Welcome to istretch",
					$body, "From: $webmaster_email" );
					echo "<script type='text/javascript'>";
					echo "alert('Resource requested successfully....')";
					echo "</script>"; 
					echo "<script>window.location.href='home.php';</script>";
				}
			}
		}										
	}
				} 
				else 
				{
					echo "<center class=error>Select valid date</center>";
				}
			}
	}
}

?>
</div>
			