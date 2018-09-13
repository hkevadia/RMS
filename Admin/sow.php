<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

echo "<div class='font'>";
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:../index.php');
}


//include "ds/footer.html";
?>
<html>
<head>
<style>

.t3
{

    display:block;

}
th
{
width:15%;
white-space:nowrap;
}
td{
width:15%;	
white-space:nowrap;
}
thead {
    display: inline-block;
    width: 100%;
    height: 20px;
}
tbody {
	margin-top:10px;
    height: 400px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}
.t3 td:nth-child(1)
{
padding-left:25px;
  text-align:center;
  width:10%;
  
}
.t3 td:nth-child(2)
{
padding-left:55px;
  text-align:left;
  width:13%;
  
}
.t3 td:nth-child(3)
{
padding-left:45px;
  text-align:left;
width:13%;
 
  
}
.t3 td:nth-child(4)
{
padding-left:50px;
  text-align:left;
  width:10%;
}
.t3 td:nth-child(5)
{
padding-right:15px;
padding-left:85px;
  text-align:center;
width:10%;
}
.t3 td:nth-child(6)
{
padding-left:130px;
  text-align:left;
 width:13%;
}

.t3 td:nth-child(7)
{
padding-left:120px;
  text-align:right;
  width:13%;
}

.t3 th:nth-child(7)
{
    padding-right:60px;
    
}
.t3 td:nth-child(8)
{
  text-align: center;
padding-right:25px;
  width:10%;
}
.t3 th:nth-child(8)
{
     text-align: left;
     padding-right:90px;

}


</style>
</head>
<body>
<br/><br/>
<center>

<h2>List of SOW</h2>
<form method="post">
<table class="t3">

<?php 
require_once "database.php"; 
$qry="select * from tbl_sow";
	$result=mysqli_query($con,$qry);
	if($result)
	{
if(mysqli_num_rows($result)>0)
{
?>
<thead><tr style="font-size:15px;"><th>Project Name</th><th>Customer Name</th><th>Project Manager</th><th>SOW Start Date</th><th>SOW End Date</th><th>SOW Status</th><th>Remaining Days</th><th>Action</th></tr></thead><tbody>
<?php
		while($row1=mysqli_fetch_array($result))
		{	
			$q=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row1[istatus_id]' ");
			$r=mysqli_fetch_array($q);
			echo "<tr><td><a href='sow_detail.php?sowid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'>".$row1['vchproject_name']."</a></td><td>".$row1['vchclient_name']."</td>";
			$qpm=mysqli_query($con,"Select * from tbl_emp where vchemp_id='$row1[vchpm]'");
			$rpm=mysqli_fetch_array($qpm);
			
			echo "<td>".$rpm['vchemp_Fname']." ".$rpm['vchemp_Lname']."</td>";
$dsow_startDate=date("d-m-Y", strtotime($row1['dsow_startDate']));
$dsow_endDate=date("d-m-Y", strtotime($row1['dsow_endDate']));
			echo "<td>".$dsow_startDate."</td><td>".$dsow_endDate."</td>";
			echo "<td>".$r['vchstatus_nm']."</td><td style='text-align:center;'>";
			$current= time();
			$date=strtotime($row1['dsow_endDate']);
			$datediff= $date-$current;
			$difference=floor($datediff/(60*60*24)) ;
			if($difference<=5)
			{
				echo "<p style='background-color:red;width:80px; text-align:'center;'>" . $difference. "</p>";
			}
			else if($difference>5 && $difference<=15)
			{
				echo "<p style='background-color:#ffbf00;width:80px;text-align:'center'>" . $difference. "</p>";
			}
			else 
			{
				echo "<p style='background-color:green;width:80px;text-align:'center'>" . $difference. "</p>";
			}
			echo "</td><td>";
if($row1['bproj_status']==0)
{
echo "Disabled";
}
else
{
echo "<a href='sow_pgupdate.php?sowid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/edit.png'  class = 'ig' title='Update SOW' name='Update'></a>&nbsp;&nbsp;&nbsp;";
			echo "<a href='updatepm.php?sowid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/profile.png'  class = 'ig' title='Update Project Manager' name='Updatep'></a>";
}
echo "</td></tr>";
		}
}
else
{
echo "<p class='error'>No record for this</p>";
}
	}
	echo "</tbody></table>";
?>
</center>
</div>
</body>
</html>
	