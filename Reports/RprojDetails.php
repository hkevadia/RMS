<?php
//include "../Rheader.php";
?>
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
    <center>

   <?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

require("fusioncharts.php");
//include("database.php");

require "database.php";

$qry=mysqli_query($con,"select distinct vchproject_id from tbl_resource_allocation order by vchproject_id");
echo "<table border=1 class='t2' style='width:80%;'><h2>Project Resources Detail</h2>";
echo "<tr><th>Project ID</th><th>Name</th><th>Project Manager</th><th>No. of Resources</th><th>No. of Billable Resources</th><th>No. of Non-Billable Resources</th><th>ANBC</th><th>ANBI</th></tr>";


              $arrData = array(
                "chart" => array
                (
                    "caption" => "No. of Resources",
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
             
while($row=mysqli_fetch_array($qry))
{
  $proj=mysqli_query($con,"select vchproject_name,vchpm from tbl_sow where vchproject_id='$row[vchproject_id]'");
  $r=mysqli_fetch_array($proj);
    $selpm=mysqli_query($con,"select vchemp_Fname, vchemp_Lname from tbl_emp where vchemp_id='$r[vchpm]'");
    $rpm=mysqli_fetch_array($selpm);
              $qryava=mysqli_query($con,"select count(allocated_emp_id) as a from tbl_resource_allocation where vchproject_id='$row[vchproject_id]'");
    while($row1=mysqli_fetch_array($qryava))
    {
       $sql1=mysqli_query($con,"select count(allocated_emp_id) as b from tbl_resource_allocation where vchproject_id='$row[vchproject_id]' AND b_bill_status='1'");
        $r1=mysqli_fetch_array($sql1);

       $sql2=mysqli_query($con,"select count(allocated_emp_id) as c from tbl_resource_allocation where vchproject_id='$row[vchproject_id]' AND b_bill_status='0'");
        $r2=mysqli_fetch_array($sql2);

       $sql3=mysqli_query($con,"select count(allocated_emp_id) as d from tbl_resource_allocation where vchproject_id='$row[vchproject_id]' AND bnonbill_status='1'");
        $r3=mysqli_fetch_array($sql3);

       $sql4=mysqli_query($con,"select count(allocated_emp_id) as e from tbl_resource_allocation where vchproject_id='$row[vchproject_id]' AND bnonbill_status='0'");
        $r4=mysqli_fetch_array($sql4);

      echo "<tr><td>$row[vchproject_id]</td><td>$r[vchproject_name]</td><td>" . $rpm['vchemp_Fname'] ." ". $rpm['vchemp_Lname']."</td>";
       echo "<td>$row1[a]</td>";
      echo "<td>$r1[b]</td><td>$r2[c]</td><td>$r3[d]</td><td>$r4[e]</td></tr>";
    
                   array_push($arrData["data"], array(
                    "label" => $r["vchproject_name"],
                    "value" => $row1["a"]
                    )
                    );

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
?>

<div id="chart-1"> Fusion Charts will render here</div>
<br>
<input type="submit" value="Export to excel" name="btnxcl" class="b">
<input type="submit" value="Back" name="btnback" class="b">
</center>
</form>
   </body>

</html>

<?php
  if(isset($_POST['btnxcl']))
  {
    // The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Projectdetails.xls");
 
// Add data table
include 'RprojDetails.php';

  }
?>
<?php
if(isset($_POST['btnback']))
  {
    echo "<script>window.location.href='../Admin/home.php';</script>";
  }

?>