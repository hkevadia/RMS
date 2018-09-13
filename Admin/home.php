<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

echo "<div class='font'>";
if(!(isset($_SESSION['adminid'])))
{
	unset($_SESSION['adminid']);
	//session_destroy();
	header('location:index.php');
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
width:18%;
	text-align:left;
white-space:nowrap;
}
td{
	width:18%;
	text-align:left;
white-space:nowrap;
}
thead {
    display: inline-block;
    width: 100%;
    height: 20px;
}
tbody {
	margin-top:10px;
    height: 200px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}



.t3 td:nth-child(6)
{
padding-right:40px;
  text-align:left;
  width:1%;
}
.t3 th:nth-child(7)
{
    padding-right:50px;
      width:1%;
}
.t3 td:nth-child(7)
{
  text-align: center;
padding-left:40px;
  
}
.t3 th:nth-child(7)
{
     text-align: center;
     padding-left:10px;

}


</style>
</head>
<body>

<center>
<br><br><br>
<h2>List of Projects</h2>
<form method="post">
<table class = "t3">

<?php 
require_once "database.php"; 

$qry="select * from tbl_sow where bproj_status!='0' ";
	$result=mysqli_query($con,$qry);
	if($result)
	{
if(mysqli_num_rows($result)>0)
{ ?>
<thead><tr style="font-size:15px;"><th>Project Name</th><th>Project Manager</th><th>Start Date</th><th>End Date</th><th>SOW Status</th><th>Remaining Days</th><th>Action</th></tr></thead><tbody>
<?php
		while($row1=mysqli_fetch_array($result))
		{	
			$q=mysqli_query($con,"select * from tbl_sowstatus where istatus_id='$row1[istatus_id]' ");
			$r=mysqli_fetch_array($q);
			
			echo "<tr><td><a href='proj_detail.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'>".$row1['vchproject_name']."</a></td>";
			$qpm=mysqli_query($con,"Select * from tbl_emp where vchemp_id='$row1[vchpm]'");
			$rpm=mysqli_fetch_array($qpm);
			
			echo "<td>".$rpm['vchemp_Fname']." ".$rpm['vchemp_Lname']."</td>";
$dsow_startDate=date("d-m-Y", strtotime($row1['dsow_startDate']));
			echo "<td>".$dsow_startDate."</td>";
$dsow_endDate=date("d-m-Y", strtotime($row1['dsow_endDate']));
                        echo"<td>".$dsow_endDate."</td>";
			echo "<td>".$r['vchstatus_nm']."</td><td style='text-align:center;'>";
			$current= time();
			$date=strtotime($row1['dsow_endDate']);
			$datediff= $date-$current;
			$difference=floor($datediff/(60*60*24)) ;
			if($difference<=5)
			{
				echo "<p style='background-color:red;width:80px;'>" . $difference. "</p>";
			}
			else if($difference>5 && $difference<=15)
			{
				echo "<p style='background-color:#ffbf00;width:80px;'>" . $difference. "</p>";
			}
			else 
			{
				echo "<p style='background-color:green;width:80px;'>" . $difference. "</p>";
			}
			echo "</td><td><a href='projdisable.php?projid=$row1[vchproject_id]' style='color:Blue; text-decoration: underline;'><img src='../icons/cc.png' style:'margin-left:50px;' class = 'ig' title='Disable' name='Disable'></a></td></tr>";
		}
	
	echo "</tbody></table>";
?>
</center>
</div>
</body>
</br></br>
</html>
<html>
   <head>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->

    <script src="../Reports/js/fusioncharts.js"></script>
    <script src="../Reports/js/themes/fusioncharts.theme.fint.js"></script>
  </head>
<center>
   <body>
  
   <?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

require("../Reports/fusioncharts.php");
include("database.php");
/* 
   The following 4 code lines contain the database connection information. 
   Alternatively, you can move these code lines to a separate 
   file and include the file here. 
   You can also modify this code based on your database connection. 
 */

// Form the SQL query that returns the top 10 most populous countries

$strQuery = "select distinct vchproject_id from tbl_resource_allocation where allocated_emp_id!='' order by vchproject_id";

// Execute the query, or else return the error message.

$result = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");

// If the query returns a valid response, prepare the JSON strin

if ($result) {
  
// The `$arrData` array holds the chart attributes and data

$arrData = array(
  "chart" => array
  (
      "caption" => "Project wise allocation",
                  "paletteColors" => "#0075c2",
                  "bgColor" => "#ffffff",
                  "borderAlpha"=> "20",
                  "canvasBorderAlpha"=> "0",
                  "usePlotGradientColor"=> "0",
                  "plotBorderAlpha"=> "10",
                  "showXAxisLine"=> "1",
                  "xAxisLineColor" => "#999999",
                  "showValues" => "0",
                  "divlineColor" => "#999999",
                  "divLineIsDashed" => "1",
                  "showAlternateHGridColor" => "0"
  )
);

$arrData["data"] = array();

// Push the data into the array

while($row = mysqli_fetch_array($result)) {
$qpnm=mysqli_query($con,"select * from tbl_sow where vchproject_id='$row[vchproject_id]'");
$rpnm=mysqli_fetch_array($qpnm);
  //echo  $row["Name"] . "<br>  ";
$qry=mysqli_query($con,"select count(allocated_emp_id) as x from tbl_resource_allocation where vchproject_id='$row[vchproject_id]' and allocated_emp_id!=''");
while($row1=mysqli_fetch_array($qry))
{
array_push($arrData["data"], array(
  "label" => $rpnm["vchproject_name"],
  "value" => $row1["x"]
  )
  );
}
}

/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

$jsonEncodedData = json_encode($arrData);

/*
 Create an object for the column chart using the FusionCharts PHP class constructor. 
 Syntax for the constructor is 
 `FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. 
 Because we are using JSON data to render the chart, the data format will be `json`. 
 The variable `$jsonEncodeData` holds all the JSON data for the chart, 
 and will be passed as the value for the data source parameter of the constructor.
*/

$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

// Render the chart

$columnChart->render();
//echo "zsdjhasjhdga";
}
else
{
  echo mysqli_error($con);
}
// Close the database connection

$con->close();

?>
  <div id="chart-1"></div>
   </body>
</center>
</html>
<?php
}
else
{
echo "<p class='error'>No data for you</p>";
}
}
?>
			