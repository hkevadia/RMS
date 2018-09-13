<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";
echo '<div class="font">';
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}

require "database.php";
$status=1;

?>
<style>
.tt9 tr:nth-child(even) { background:#e6e6e6;}
.tt9 tr:nth-child(odd) { background:#CCC;}
.t91 tr:nth-child(even) { background:#e6e6e6;}
.t91 tr:nth-child(odd) { background:#CCC;}
.tt9
{
	
    display:block;
	 z-index: -1;
    
    width: 100%;
    border-color: #2f2f2f;
    height:45%;
    border-collapse: collapse;

}
.tt9 th
{
width:18%;
	text-align:left;
white-space:nowrap;
border:none;
    //border-color: #2f2f2f;
    
    background-color: #f37123;
    color: black;
    
    height: 30px;
    
    font-weight: lighter;
    text-align: left;
    
}
.tt9 td{
	  border-color: #2f2f2f;
  
    border: none  ;
 
    height: 30px;
    
    text-align: left;
	width:18%;
	text-align:left;
white-space:nowrap;
}
.tt9 thead {
    display: inline-block;
    width: 100%;
    height: 20px;
}
.tt9 tbody {
	margin-top:10px;
    height: 350px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}
///////////////////////



.tt9 th:nth-child(7)
{
     text-align: center;
     padding-right:70px;

}



///////////////////////


.t91
{
	
    display:block;
	 z-index: -1;
    
    width: 100%;
    border-color: #2f2f2f;
    height:45%;
border-spacing: 0;
    //border-collapse: collapse;

}
.t91 th
{

	text-align:left;
white-space:nowrap;
border:none;
    border-color: #2f2f2f;
    
    background-color: #f37123;
    color: black;
    
    height: 30px;
    margin-left:-3px;
	padding:none;
    font-weight: lighter;
    text-align: left;
    
}
.t91 td{
	  border-color: #2f2f2f;
  
    border: none  ;
 
    height: 30px;
    
    text-align: left;
	width:25%;
	text-align:left;
white-space:nowrap;
}
.t91 thead {
    display: inline-block;
    width: 100%;
    height: 20px;
}
.t91 tbody {
	margin-top:10px;
    height: 350px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}
///////////////////////




.t91 tr
{
    border-color: #2f2f2f;
    height: -30px;
    margin:none;
    align :center;
}

.t91 th:nth-child(1)
{
padding-right:150px;
  text-align:left;
width:318px;
}

.t91 th:nth-child(2)
{
padding-left:0px;
  text-align:left;
  width:338.5px;
}

.t91 th:nth-child(3)
{
padding-left:150px;
  text-align:left;
  width:326px;
}

.t91 th:nth-child(4)
{
padding-right:106px;
  text-align:right;
  width:316px;
}

.t91 th:nth-child(5)
{
padding-right:74px;
  text-align:right;
  width:327px;
}

</style>
<center>
<br/><br/><br/><br/>
<?php

if((!isset($_GET['srno'])) && (!isset($_GET['all'])) && (!isset($_GET['apr'])))
{ 
?>
<h2> Resource Allocation </h2>
<form method="post">
<table>
<tr style="background-color:transparent;">
<td>Select Project&nbsp;&nbsp;</td>
<td>
<?php 
$query=mysqli_query($con,"select distinct tbl_resource_allocation.vchproject_id,vchproject_name,bsaved_status from tbl_resource_allocation,tbl_sow where tbl_sow.vchproject_id=tbl_resource_allocation.vchproject_id and bsaved_status='-1' order by vchproject_name ");

echo "<select name=selres  class='textbox' ><option value=''>Select Value</option>";
if($query)
	{
		while($row1=mysqli_fetch_array($query))
		{	
			?>
			<option value="<?php echo $row1['vchproject_id']; ?>" <?php if(isset($_POST['selres'])){if($_POST['selres']==$row1['vchproject_id']){echo "selected";}} ?> > <?php echo $row1['vchproject_id'] . " | " . $row1['vchproject_name']; ?> </option>
			<?php
		}
	}
	?>
</select>
</td>
&nbsp;
<td colspan='2' align="center"><input type="submit" name="btnall" value="Go" class="button"></td>
</tr>
</table>
</form>
<?php 

$_SESSION['selres']=$_POST['selres'];
}
?>
<?php
if(isset($_POST['btnall']))
{
		//echo $_POST['selres'];
		$qry=mysqli_query($con,"select * from tbl_resource_allocation where vchproject_id='$_POST[selres]' and allocated_emp_id='' and bsaved_status='-1' ");
echo "<form method='post'>";
	if(mysqli_num_rows($qry)>0)
	{ 
		$status=0;
		echo "<br><br><table class='tt9'>";
		$proj=mysqli_query($con,"select vchproject_id,vchproject_name from tbl_sow where vchproject_id='$_POST[selres]'");
		
		echo "<thead><tr><th>Skills</th><th>Designation</th><th>Start date</th><th>End Date</th><th>Allocation Required</th><th>Request Type</th><th>Actions</th></tr></thead><tbody>";
		while($row=mysqli_fetch_array($qry))
		{
			echo "<tr>";
			$_SESSION['desg']=$row['vchdesignation_id'];
			?><td><?php $skl=mysqli_query($con,"select vchSkills from tbl_skills where vchSkills_id='$row[vchskill_id]'");
			if($skl)
			{
				while($skl1=mysqli_fetch_array($skl))
				{
					echo $skl1['vchSkills'];
				}
			}
			else{ echo mysqli_error($con); }
			?></td>
			<td>
			<?php $des=mysqli_query($con,"select vchdesignation_name from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
			if($des)
			{
				while($des1=mysqli_fetch_array($des))
				{
					echo $des1['vchdesignation_name'];
				}
			}
			echo "</td>";
			echo "<td>$row[dresource_startdate]</td>";
			echo "<td>$row[dresource_enddate]</td>";
			echo "<td>$row[fper_allocation_req]</td>";
			if($row['bsowreq']==1)
			{
				echo "<td>SOW</td>";
			}
			else
			{
				echo "<td>Additional</td>";
			}
			echo "<td><a href='res_allocation.php?srno=$row[Srno]&desg1=$row[vchdesignation_id]'><input  class='button' type=button value=Select></a></td>";
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
	else
	{
		if($status==1)
		{
			echo "<script type='text/javascript'>";
			echo "alert('No requests for this project....')";
			echo "</script>";
			echo "<script>window.location.href='res_allocation.php';</script>";
		}
	}
	echo "</tbody></table></form>";
}


?>

<?php

if(isset($_GET['srno']))
{
	if(isset($_GET['desg1']) || isset($_GET['apr']) || isset($_GET['all']))
	{
		//$status1=1;
		//$status2=1;
		echo "<form>";
			//echo "" . $_REQUEST['desg1'];
		//echo $_REQUEST['uid'];
				$_SESSION['srno1']=$_GET['srno'];
				$_SESSION['des']=$_GET['desg1'];
				echo "<table>";
				//echo "<tr><td> <input type=submit name='apr' value='As per Request' class='button'></td>";
				echo "<tr><td> <input type=submit name='back' value='Back' class='button'></td>";
				echo "<td> <input type=submit name='all' value='All' class='button'></td></tr>";
				echo "</table>";

		//echo "</form>";
	}
$_SESSION['srno1']=$_GET['srno'];
			$_SESSION['des']=$_GET['desg1'];
	echo "<form>";
	$qry=mysqli_query($con,"select * from tbl_resource_allocation where Srno=$_SESSION[srno1] ");
	if(mysqli_num_rows($qry)>0)
	{ 
		$status=0;
		echo "<table class='t3'><h2>Criteria</h2>";
		$proj=mysqli_query($con,"select vchproject_id,vchproject_name from tbl_sow where vchproject_id='$_POST[selres]'");
		if($proj)
		{
				while($pro=mysqli_fetch_array($proj))
				{
					echo "<tr><td>Project ID</td><td><label name=txtpid>".$pro['vchproject_id']."</td>";
					echo "<td>Project Name</td><td><label name=txtpnm>".$pro['vchproject_name']."</td></tr>";
					$pnm=$pro['vchproject_name'];
				}
		}
		echo "<tr><th>Skills</th><th>Designation</th><th>Start date</th><th>End Date</th><th>Allocation Required</th><th>SOW</th></tr>";
		while($row=mysqli_fetch_array($qry))
		{
			echo "<tr>";
			$_SESSION['desg']=$row['vchdesignation_id'];
			?><td><?php $skl=mysqli_query($con,"select vchSkills from tbl_skills where vchSkills_id='$row[vchskill_id]'");
			if($skl)
			{
				while($skl1=mysqli_fetch_array($skl))
				{
					echo $skl1['vchSkills'];
				}
			}
			else{ echo mysqli_error($con); }
			?></td>
			<td>
			<?php $des=mysqli_query($con,"select vchdesignation_name from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
			if($des)
			{
				while($des1=mysqli_fetch_array($des))
				{
					echo $des1['vchdesignation_name'];
				}
			}
			echo "</td>";
			echo "<td>$row[dresource_startdate]</td>";
			echo "<td>$row[dresource_enddate]</td>";
			echo "<td>$row[fper_allocation_req]</td>";
			if($row['bsowreq']==1)
			{
				echo "<td>Yes</td>";
			}
			else
			{
				echo "<td>No</td>";
			}
			
			echo "</tr>";
		}
		echo "</table>";
	}

	$emp1=mysqli_query($con,"select * from tbl_emp where vchdesignation_id='$_SESSION[des]' AND bemp_status!='0' ");
	
	
	if(mysqli_num_rows($emp1)>0)
	{
		//$status1=0;
		echo "<br><br><br><table class='t91' border='0' cellpadding='0' cellspacing='0'><h2>As Per Request</h2><thead><tr><th>Employee Id</th><th>Name</th><th>Designation</th><th>Total Allocation</th><th style='padding-right:54px;'>Action</th></tr></thead><tbody>";
		
		while($emp=mysqli_fetch_array($emp1))
		{
			$persum=0;
		
			$des=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$emp[vchdesignation_id]' ");
			$rdes=mysqli_fetch_array($des);
			
			$alocat=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$emp[vchemp_id]' ");
			
			while($ralocat=mysqli_fetch_array($alocat))
			{
				$persum=$persum + $ralocat['fper_allocation_req'];
			}
		
			echo "<tr>";
			echo "<td>".$emp['vchemp_id']."</td>";
			echo "<td>".$emp['vchemp_Fname']." ".$emp['vchemp_Lname']."</td>";
			echo "<td>".$rdes['vchdesignation_name']."</td>";
			echo "<td>".$persum."</td>";
			echo "<td><a href='res_allocation.php?srno=$_SESSION[srno1]&uid=$emp[vchemp_id]'><input type=button name='aprsel' class='button' value='Select'></a></td>";
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
	else
	{ 
		echo "<script type='text/javascript'>";
		echo "alert('No such employee exists for this criteria....')";
		echo "</script>";
		echo "<script>window.location.href='res_allocation.php?all=All';</script>";
	}
echo "<br><br>";



	echo "</form>";

}
if(isset($_GET['back']))
{
	if(isset($_SESSION['srno1']) || isset($_SESSION['des']) || isset($_SESSION['desg']))
	{
		unset($_SESSION['srno1']);
		unset($_SESSION['des']);
unset($_SESSION['desg']);
if(!(isset($_SESSION['srno1']) || isset($_SESSION['des']) || isset($_SESSION['desg'])))
{
echo "<script>window.location.href='res_allocation.php';</script>";
}
	}
	
}

if(isset($_GET['all']))
{
	echo "<form>";
	$qry=mysqli_query($con,"select * from tbl_resource_allocation where Srno=$_SESSION[srno1] ");
	if(mysqli_num_rows($qry)>0)
	{ 
		$status=0;
		echo "<br><br><table class='t3'>";
echo "<h2>Criteria</h2>";
		$proj=mysqli_query($con,"select vchproject_id,vchproject_name from tbl_sow where vchproject_id='$_POST[selres]'");
		if($proj)
		{
				while($pro=mysqli_fetch_array($proj))
				{
					echo "<tr><td>Project ID</td><td><label name=txtpid>".$pro['vchproject_id']."</td>";
					echo "<td>Project Name</td><td><label name=txtpnm>".$pro['vchproject_name']."</td></tr>";
					$pnm=$pro['vchproject_name'];
				}
		}
		echo "<tr><th>Skills</th><th>Designation</th><th>Start date</th><th>End Date</th><th>Allocation Required</th><th>SOW</th></tr>";
		while($row=mysqli_fetch_array($qry))
		{
			echo "<tr>";
			$_SESSION['desg']=$row['vchdesignation_id'];
			?><td><?php $skl=mysqli_query($con,"select vchSkills from tbl_skills where vchSkills_id='$row[vchskill_id]'");
			if($skl)
			{
				while($skl1=mysqli_fetch_array($skl))
				{
					echo $skl1['vchSkills'];
				}
			}
			else{ echo mysqli_error($con); }
			?></td>
			<td>
			<?php $des=mysqli_query($con,"select vchdesignation_name from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
			if($des)
			{
				while($des1=mysqli_fetch_array($des))
				{
					echo $des1['vchdesignation_name'];
				}
			}
			echo "</td>";
			echo "<td>$row[dresource_startdate]</td>";
			echo "<td>$row[dresource_enddate]</td>";
			echo "<td>$row[fper_allocation_req]</td>";
			if($row['bsowreq']==1)
			{
				echo "<td>Yes</td>";
			}
			else
			{
				echo "<td>No</td>";
			}
			
			echo "</tr>";
		}
		echo "</table>";

	}

	$emp21=mysqli_query($con,"select * from tbl_emp where bemp_status!='0' ");
	
	if(mysqli_num_rows($emp21)>0)
	{
echo "<br><br><h2>All Resources</h2>";
		echo "<table class='t91' border='0' cellpadding='0' cellspacing='0'><thead><tr><th>Employee Id</th><th>Name</th><th>Designation</th><th>Total Allocation</th><th>Action</th></tr></thead><tbody>";
		
		while($emp2=mysqli_fetch_array($emp21))
		{
			$persum2=0;
		
			$des2=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$emp2[vchdesignation_id]' ");
			$rdes2=mysqli_fetch_array($des2);	
			
			$alocat2=mysqli_query($con,"select * from tbl_resource_allocation where allocated_emp_id='$emp2[vchemp_id]' ");
		
			while($ralocat2=mysqli_fetch_array($alocat2))
			{
				$persum2=$persum2 + $ralocat2['fper_allocation_req'];
			}
			echo "<tr>";
			echo "<td>".$emp2['vchemp_id']."</td>";
			echo "<td>".$emp2['vchemp_Fname']." ".$emp2['vchemp_Lname']."</td>";
			echo "<td>".$rdes2['vchdesignation_name']."</td>";
			echo "<td>".$persum2."</td>";
			echo "<td><a href='res_allocation.php?srno11=$_SESSION[srno1]&uid1=$emp2[vchemp_id]'><input type=button name='allsel' class='button' value='Select'></a></td>";
			echo "</tr>";
		}
		echo "</tbody></table>";

//echo "<a href='res_allocation.php?back1=1'><input type='button' value='Back' class='button'></a>";

	}
echo "</form>";

	/*else
	{ 
		echo "<script type='text/javascript'>";
		echo "alert('No such employee exists for criteria....')";
		echo "</script>";
		echo "<script>window.location.href='res_allocation.php';</script>";
	}*/
	
echo "<form method='POST'><input type='submit' value='Back' name='back1' class='button'></form>";
	
}
if(isset($_POST['back1']))
{
//echo "sdsdadasds";
	if(isset($_SESSION['srno1']) || isset($_SESSION['des'])  )
	{
		unset($_SESSION['srno1']);
		unset($_SESSION['des']);	
unset($SESSION['desg']);
if(!(isset($_SESSION['srno1']) || isset($_SESSION['des']) ))
{
echo "<script>window.location.href='res_allocation.php';</script>";
}
//echo "<script>window.location.href='res_allocation.php';</script>";
	}
	
}
?>
<?php

include("database.php");

//if(isset($_GET['selemp']))
//{
	if(isset($_GET['uid']))
	{
	
	$empid = $_GET['uid'] ;
	$srno = $_SESSION['srno1'];
	$sel=mysqli_query($con,"select * from tbl_emp where vchemp_id='$empid'");
	if(mysqli_num_rows($sel)==1)
	{
		$pqry=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$srno'");
		if($pqry)
		{
			while($email=mysqli_fetch_array($sel))
			{
				while($proj=mysqli_fetch_array($pqry))
				{
					$q=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj[vchproject_id]' ");
					while($row2=mysqli_fetch_array($q))
					{
						//generate password and send mail
						$email1= $email['vchemail'];
						$body = "Hello " . $email['vchemp_Fname'] ." ". $email['vchemp_Lname'] . "
You have been allocated in Project " . $row2['vchproject_name'] . " for " . $proj['dresource_startdate'] . " to " . $proj['dresource_enddate'] ." duration.";
							//echo "jhds" . $_SESSION['srno1'];
							$updt=mysqli_query($con,"update tbl_resource_allocation set allocated_emp_id='$_REQUEST[uid]' where Srno='$srno'");
							if($updt)
							{
								/*
								This first bit sets the email address that you want the form to be submitted to.
								You will need to change this value to a valid email address that you can access.
								*/

								$webmaster_email = "infostretch@mail.com";
								require_once "database.php";
								$feedback_page = "error_message.html";
								$error_page = "error_message.html";
								$rdirect="res_allocation.php";
								
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
								/*if (!isset($_REQUEST['email'])) {
								header( "Location: $feedback_page" );
								}*/

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
									//error_reporting(E_ERROR | E_PARSE);
								mail( "$email1", "Welcome to istretch",
								  $body, "From: $webmaster_email" );
									echo "<script type='text/javascript'>";
									echo "alert('Resource allocated successfully....')";
									echo "</script>";
								echo "<script>window.location.href='res_allocation.php';</script>";
								}
												
							}
							else
							{
								//echo mysqli_error($con);
							}
					}
				}
			}
		}
		
	}
	else
	{
		echo "<center class=error>No such record found</center>";
	}
	
	}
//}

//if(isset($_GET['btnsel2']))
//{
if(isset($_GET['uid1']))
{
	$empid = $_GET['uid1'] ;
	$srno = $_SESSION['srno1'];
	$sel=mysqli_query($con,"select * from tbl_emp where vchemp_id='$empid'");
	if(mysqli_num_rows($sel)==1)
	{
		$pqry=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$srno'");
		if($pqry)
		{
			while($email=mysqli_fetch_array($sel))
			{
				while($proj=mysqli_fetch_array($pqry))
				{
					$q=mysqli_query($con,"select * from tbl_sow where vchproject_id='$proj[vchproject_id]' ");
					while($row2=mysqli_fetch_array($q))
					{
						//generate password and send mail
						$email1= $email['vchemail'];
						$body = "Hello " . $email['vchemp_Fname'] ." ". $email['vchemp_Lname'] . "
You have been allocated in Project " . $row2['vchproject_name'] . " for " . $proj['dresource_startdate'] . " to " . $proj['dresource_enddate'] ." duration.";
							//echo "jhds" . $_SESSION['srno1'];
							$updt=mysqli_query($con,"update tbl_resource_allocation set allocated_emp_id='$_GET[uid1]' where Srno='$srno'");
							if($updt)
							{
								/*
								This first bit sets the email address that you want the form to be submitted to.
								You will need to change this value to a valid email address that you can access.
								*/

								$webmaster_email = "infostretch@mail.com";
								require_once "database.php";
								$feedback_page = "error_message.html";
								$error_page = "error_message.html";
								$rdirect="res_allocation.php";
								
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
									//error_reporting(E_ERROR | E_PARSE);
								mail( "$email1", "Welcome to istretch",
								  $body, "From: $webmaster_email" );
								  echo "<script type='text/javascript'>";
									echo "alert('Resource allocated successfully....')";
									echo "</script>";
								echo "<script>window.location.href='res_allocation.php';</script>";
								}
								
								
								
							}
							else
							{
								//echo mysqli_error($con);
							}
					}
				}
			}
		}
		
	}
	else
	{
		echo "<center class=error>No such record found</center>";
	}
	
	}
//}	

echo "</center>";
?>
</div>