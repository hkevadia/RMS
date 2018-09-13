<style>
.error {color: #FF0000;}
</style>

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

echo '<div class="font">';

require_once "database.php";
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
$_SESSION['sowid']=$_GET['sowid'];
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[adminid]' ");
$r=mysqli_fetch_array($q);

$status=0;

// define variables and set to empty values
$proj_idErr = $proj_mngrErr = "";
$proj_id = $proj_mngr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	/*if(empty($_POST["proj_mngr"]))
	{
		$status=1;
		$proj_mngrErr = "Select Project Manager";
	}
	
	if (empty($_POST["proj_id"])) 
	{
		$status=1;
		$proj_idErr = "Select Project";
	} */
	
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE html>
<html>
<head>

<!--<link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui.js"></script>

<script>
$(function() 
{
	$( "#startdate" ).datepicker({
			dateFormat: "dd/mm/yy",
			    changeMonth: true,
      			changeYear: true
	});
	$( "#enddate" ).datepicker({
			dateFormat: "dd/mm/yy",
			    changeMonth: true,
      			changeYear: true
	});
});
</script>-->
<script>
	function selsub()
	{
		//document.forms[0].action="updatepm.php";
		document.forms[0].submit();
	}
</script>
</head>
<?php
//$_SESSION['sowid']=$_GET['sowid'];
$q=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_GET[sowid]' ");
$r=mysqli_fetch_array($q);
?>
<body>
<center>
<br/><br/>
<h2>Update Project Manager</h2>

<form action="#" method="post" onsubmit="ShowLoading()">
<table  class="t1" border="1">
<th colspan='8' align='left'>Update Project Manager</th></tr>
<tr>
<td>Project Name</td><td><?php echo $r['vchproject_name']; ?></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td>Select Project Manager&nbsp;&nbsp;</td><br><td><table name="proj_mngr"  border=1 class="textbox" >
<?php
require_once "database.php";

$q="select * from tbl_emp where bemp_status!='0' AND vchemp_id NOT IN (select vchemp_id from tbl_practicehead) AND vchemp_id NOT IN (select vchpm from tbl_sow where vchproject_id='$_GET[sowid]') ";
$result = mysqli_query($con,$q);
if (mysqli_num_rows($result) > 0)
{
	echo "<tr><th>ID</th><th>Name</th><th>Designation</th><th>No. of <br> projects</th><th>Action</th></tr>";
	//echo '<td><select name="proj_mngr"  class="textbox">'; // Open your drop down box
	// Loop through the query results, outputing the options one by one
	while ($row = mysqli_fetch_assoc($result))
	{
		//echo '<option value="'.$row['vchemp_id'].'">'.$row['vchemp_Fname'].' '.$row['vchemp_Lname'].'</option>';
		echo "<tr><td>$row[vchemp_id]</td>";
		echo "<td>$row[vchemp_Fname]</td>";
		$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
		$rdes=mysqli_fetch_array($qrydes);
		echo "<td>$rdes[vchdesignation_name]</td>";
		$cntqry=mysqli_query($con,"select count(*) as a from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]' or req_from='$row[vchemp_id]'");
		$rcnt=mysqli_fetch_array($cntqry);
		if($rcnt['a']!='')
		{
			echo "<td>$rcnt[a]</td>";
		}
		else
		{
			echo "<td>Bench</td>";
		}
		echo "<td><a href=updatepm.php?xid=$row[vchemp_id]&pid=$_GET[sowid]><input type='button' class='button' value='Select' name='selpm'></a></td></tr>";
	}
		
}

?>

</table>
</tr>
<tr><td></td><td colspan='2' style='padding-left:200px;'><a href='sow.php'><input type='button' value='Cancel' class='button'></a></td></tr>
<tr></tr><tr></tr>

<tr><td class="error" align="right" colspan="2"><h3>* Required Field</h3></td></tr>
</table>

</form>
</center>
<?php

require_once "database.php";

/*if(isset($_POST['proj_id']))
{
	echo $_POST['proj_id'];
}*/
	//echo $_GET['pid'];
	if(isset($_GET['xid']))
	{	 
		if($status==0)
		{
			//echo "success";
			$proj_mngr = $_GET['xid'];
			//$dept = $r['vchdept_id'];
			$proj_id = $_GET['pid'];
			
			$q=mysqli_query($con,"update tbl_sow set vchpm='$proj_mngr' where vchproject_id='$proj_id'");
					
			if ($q)
			{
				echo "<script type='text/javascript'>";
				echo "alert('Project Manager is updated successfully....')";
				echo "</script>";
				echo "<script>window.location.href='sow.php';</script>";
			}
			else
			{
				echo "<center class=error>Project Manager is not updated....</center>";
			}
		}
	}


?>
</div>
</body>
</html>		