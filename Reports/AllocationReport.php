<html>
   <head>
    <title>graph</title>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->

    <script src="js/fusioncharts.js"></script>
    <script src="js/themes/fusioncharts.theme.fint.js"></script>
  </head>

   <body>
  <form method="post">
   <?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

require("fusioncharts.php");
include("database.php");
//include "../header.php";
//include("../Rheader.php");
/* 
   The following 4 code lines contain the database connection information. 
   Alternatively, you can move these code lines to a separate 
   file and include the file here. 
   You can also modify this code based on your database connection. 
 */

// Form the SQL query that returns the top 10 most populous countries

$strQuery = "select distinct allocated_emp_id from tbl_resource_allocation where allocated_emp_id!=''";

// Execute the query, or else return the error message.

$result = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");

// If the query returns a valid response, prepare the JSON strin

if ($result) {
  
// The `$arrData` array holds the chart attributes and data

$arrData = array(
  "chart" => array
  (
      "caption" => "Allocation Graph",
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
?>
<center>
<h2>Allocation Report</h2>
<table border=1 class="t2" style="width: 30%; height: 23.45%;">
  <tr><th>Employee ID</th><th>Allocation Percentage</th></tr>
 
<?php
while($row = mysqli_fetch_array($result)) {
  //echo  $row["Name"] . "<br>  ";
  $qrysel=mysqli_query($con,"select sum(fper_allocation_req) as a, allocated_emp_id from tbl_resource_allocation where allocated_emp_id='$row[allocated_emp_id]'");
  if($row1=mysqli_fetch_array($qrysel))
  {
    echo " <tr><td>$row1[allocated_emp_id]</td>";
    echo "<td>$row1[a]</td></tr>";

     array_push($arrData["data"], array(
      "label" => $row1["allocated_emp_id"],
      "value" => $row1["a"]
      )
      );
      /* if($row['allocated_emp_id']==$row1['allocated_emp_id'])
       {
        break;
       }*/
  }
}
echo "</table><br><br><br><br>";


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
  <div id="chart-1"> Fusion Charts will render here</div>
   <br>
<input type="submit" value="Export to excel" name="btnxcl" class="b">
<input type="submit" value="Back" name="btnback" class="b">
</form>
   </body>

</center>
</html>
<?php
  if(isset($_POST['btnxcl']))
  {
    // The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=allocation.xls");
 
// Add data table
include 'AllocationReport.php';

  }
?>
<?php
if(isset($_POST['btnback']))
  {
    echo "<script>window.location.href='../Admin/home.php';</script>";
  }

?>