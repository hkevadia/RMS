<style>
.error {color: #FF0000;}
 
.button1
{
	color:white;
	background-color: #000000;
	font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	border-color: #2F2f2f;
	height: 15px;
	width: 15px;
	font-size: 4px;
    opacity: 0.7;
        
}

#scroll
{
   
    height:310px;
width:430px;
    overflow:scroll;
    overflow-x:hidden;	
	

}
.t4
{
 border:none;

}
.t4 th
{
    text-align:left;
    white-space:nowrap;
	 border:1px;
}
.t4 td{
	
	text-align:left;
        white-space: nowrap;
		border:none;

}
.t4 thead {
	
	
    display: inline-block;
    
   
}
.t4 tbody {
	margin-top:25px;
    
    display: inline-block;
    
    overflow: auto;
}
th:nth-child(1)
{
	width:75px;
}
th:nth-child(2)
{
	width:100px;
}
th:nth-child(3)
{
	width:120px;
}
th:nth-child(4)
{
	width:80px;
}
th:nth-child(5)
{
	width:90px;
}

td:nth-child(1)
{
	width:80px;
}
td:nth-child(2)
{
	width:180px;
}
td:nth-child(3)
{
	width:130px;
}
td:nth-child(4)
{
	width:100px;
}
td:nth-child(5)
{
	width:130px;
        text-align:right;
} 
</style>
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";

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
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
$q=mysqli_query($con,"select * from tbl_emp where vchemp_id='$_SESSION[userid]' ");
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
		//document.forms[0].action="selectpm.php";
		document.forms[0].submit();
	}
</script>
</head>
<body>
<center>
<br/><br/><br/><br/>
<h2>Select Project Manager</h2>

<form action="#" method="post">
<table  class="t1" border='1' style= "width:50%;">
<th colspan='3' align='left'>Select Project Manager</th></tr>

<tr>
<td>Project Manager Type</td>
<td><input type="radio" name="etype"  value="Bench" onchange="location.href='selectpm.php?x=Bench'" <?php if (isset($_GET['x']) && $_GET['x']=="Bench") { echo "<input type=radio name=etype checked>";}else{ echo ">";} ?>  Bench
  <br>
  <input type="radio" name="etype" value="Occupied" onchange="location.href='selectpm.php?x=Occupied'" <?php if (isset($_GET['x']) && $_GET['x']=="Occupied"){ echo "<input type=radio name=etype checked>";}else{ echo ">";} ?>  Occupied
  <span class="error"> <?php echo $etypeErr;?></span>
  </td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Project</td>
<td>
<select name="proj_id"  class="textbox" onChange="selsub()"><option value="">Select Value</option>
<?php 
$qry=mysqli_query($con,"select * from tbl_sow where vchph='$_SESSION[userid]' AND vchpm='' and bproj_status!='0'  or vchdept_id=(select vchdept_id from tbl_practicehead where vchemp_id='$_SESSION[userid]') order by vchproject_name");
if($qry)
{
	while($row1=mysqli_fetch_array($qry))
	{
		?>
		<option value="<?php echo $row1['vchproject_id']; ?>" <?php if(isset($_POST['proj_id'])){if($_POST['proj_id']==$row1['vchproject_id']){echo "selected";}} ?> > <?php echo $row1['vchproject_name']; ?> </option>
		<?php
	}
}
?>
</select>
<span class="error">* <?php echo $proj_idErr;?></span> </td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td>Project Manager&nbsp;&nbsp;</td><br><td>



<?php
require_once "database.php";
if(isset($_GET['x']))
{   
	if($_GET['x']=='Bench')
	{ ?>
		<div id="scroll"><table name="proj_mngr"  class="t4" value="<?php if(isset($_POST['proj_mngr'])) { echo $_POST['proj_mngr']; } ?>" >
		<?php
		$q="select * from tbl_emp where bemp_status!='0' AND vchemp_id NOT IN (select DISTINCT req_from from tbl_resource_allocation) AND vchemp_id NOT IN (select DISTINCT vchemp_id from tbl_practicehead) AND vchemp_id NOT IN (select DISTINCT allocated_emp_id from tbl_resource_allocation where allocated_emp_id!='') order by vchemp_Fname";
		
		$result = mysqli_query($con,$q);
		if (mysqli_num_rows($result) > 0)
		{
			echo "<thead><tr><th style='width:65px;'>ID</th><th style='width:80px;'>Name</th><th style='width:110px;'>Designation</th><th style='width:90px;'>Action</th></tr></thead>";
			//echo '<td><select name="proj_mngr">'; // Open your drop down box
			// Loop through the query results, outputing the options one by one
			
			while ($row = mysqli_fetch_assoc($result))
			{
				//echo '<option value="'.$row['vchemp_id'].'">'.$row['vchemp_Fname'].' '.$row['vchemp_Lname'].'</option>';
				echo "<tbody><tr><td style='width:65px;text-align:left'>$row[vchemp_id]</td>";
				echo "<td style='width:80px;text-align:left'>$row[vchemp_Fname] $row[vchemp_Lname]</td>";
				$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
				$rdes=mysqli_fetch_array($qrydes);
				echo "<td style='width:110px;text-align:left'>$rdes[vchdesignation_name]</td>";
				echo "<td style='width:90px;text-align:left'><a href=selectpm.php?xid=$row[vchemp_id]&pid=$_POST[proj_id]><input type='button' class='button1' value='Select' name='selpm'></a></td></tr></tbody>";
			}
			echo ' <span class="error"><?php echo $proj_mngrErr;?></span> </table></div>';
		}
	}
	else if($_GET['x']=='Occupied')
	{
		?>

		<div id="scroll"><table name="proj_mngr"  class="t4" value="<?php if(isset($_POST['proj_mngr'])) { echo $_POST['proj_mngr']; } ?>" >
		<?php
		$q="select * from tbl_emp where bemp_status!='0' AND vchemp_id NOT IN (select DISTINCT vchemp_id from tbl_practicehead) AND (vchemp_id IN (select DISTINCT allocated_emp_id from tbl_resource_allocation) or vchemp_id IN (select DISTINCT req_from from tbl_resource_allocation))";
		$result = mysqli_query($con,$q);
		if (mysqli_num_rows($result) > 0)
		{
			echo "<thead><tr><th>ID</th><th>Name</th><th>Designation</th><th>No. of <br> projects</th><th>Action</th></tr></thead>";
			//echo '<td><select name="proj_mngr"  class="textbox">'; // Open your drop down box
			// Loop through the query results, outputing the options one by one
			while ($row = mysqli_fetch_assoc($result))
			{
				//echo '<option value="'.$row['vchemp_id'].'">'.$row['vchemp_Fname'].' '.$row['vchemp_Lname'].'</option>';
				echo "<tbody><tr><td style='width:45px;text-align:left'>$row[vchemp_id]</td>";
				echo "<td style='width:65px;text-align:left'>$row[vchemp_Fname] $row[vchemp_Lname]</td>";
				$qrydes=mysqli_query($con,"select * from tbl_designation where vchdesignation_id='$row[vchdesignation_id]'");
				$rdes=mysqli_fetch_array($qrydes);
				echo "<td style='width:80px;text-align:left'>$rdes[vchdesignation_name]</td>";
				$cntqry=mysqli_query($con,"select count(*) as a from tbl_resource_allocation where allocated_emp_id='$row[vchemp_id]' or req_from='$row[vchemp_id]'");
				$rcnt=mysqli_fetch_array($cntqry);
				echo "<td style='width:60px;text-align:left'>$rcnt[a]</td>";
				echo "<td style='width:80px;text-align:left'><a href=selectpm.php?xid=$row[vchemp_id]&pid=$_POST[proj_id]><input type='button' class='button1' value='Select' name='selpm'></a></td></tr></tbody>";
			}
			echo ' <span class="error"><?php echo $proj_mngrErr;?></span></table></div> ';
		}
	}
}

?>

</td>
</tr>
<tr><td></td><td colspan='2' style='padding-left:200px;'><a href='home.php'><input type='button' value='Cancel' class='button'></a></td></tr>
<tr></tr><tr></tr>

<tr><td class="error" align="right" colspan="2" ><h3>* Required Field</h3></td></tr>
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
		if($_GET['pid']=="")
		{
				$status=1;
		}

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
				echo "alert('Project Manager is selected successfully....')";
				echo "</script>";
				echo "<script>window.location.href='home.php';</script>";
			}
			else
			{
				echo "<center class=error>Project Manager is not selected....</center>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('No Project Selected....')";
			echo "</script>";
		}
	}


?>
</div>
</body>
</html>				