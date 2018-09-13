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

$qry=mysqli_query($con,"select * from tbl_designation");
echo "<table border=1 class='t2' style='width: 30%; height: 23%;'><caption><h2>Designation Wise No. of Resources</h2></caption>";
echo "<tr><th>Designation</th><th>No. of Resources</th></tr>";

              $arrData = array(
                "chart" => array
                (
                    "caption" => "Designation Wise No. of Resources",
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
while($r=mysqli_fetch_array($qry))
{
  $selemp=mysqli_query($con,"select count(*) as a from tbl_emp where vchdesignation_id='$r[vchdesignation_id]'");
  while($remp=mysqli_fetch_array($selemp))
  {

            echo "<tr>";
            echo "<td>$r[vchdesignation_name]</td>";
            echo "<td>$remp[a]</td></tr>";
                   array_push($arrData["data"], array(
                    "label" => $r["vchdesignation_name"],
                    "value" => $remp["a"]
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
</form>
</center>
   </body>

</html>

<?php
  if(isset($_POST['btnxcl']))
  {
    // The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=designation.xls");
 
// Add data table
include 'DesigWiseReport.php';

  }
?>
<?php
if(isset($_POST['btnback']))
  {
    echo "<script>window.location.href='../Admin/home.php';</script>";
  }

?>