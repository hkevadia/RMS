<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";

echo '<div class="font">';

require_once "database.php";
?>
<?php
if(!(isset($_SESSION['userid'])))
{
	unset($_SESSION['userid']);
	//session_destroy();
	header('location:../index.php');
}
?>

 <script>
            function addMore() {
            	alert("here u r");
                $("<tbody>").load("addUI.php", function () {
                    $("#product").append($(this).html());
                });
            }

            $(".deletebutton").on('click', function () {
                var checked = jQuery('input:checkbox:checked').map(function () {
                    return this.value;
                }).get();
                jQuery('input:checkbox:checked').parents("tr").remove();

            });


        </script> 
<form method="post" onsubmit="ShowLoading()">

<center> <br><br>
<h2>SOW Resource Details for <?php $qry=mysqli_query($con,"select vchproject_name from tbl_sow where vchproject_id='$_SESSION[projid]'"); $r=mysqli_fetch_array($qry); echo $r['vchproject_name'];  ?></h2>
<table border=1>	
  <tr><th>Desgination</th><th>No. of<br> people</th><th>% Allocation</th><th>Billable/<br>Non-billable</th><th>Billability</th><th>Start date</th><th>End Date</th></tr>
</table>
<!--	 <DIV class="product-item float-clear" style="clear:both;">   -->
	<?php  
	$cnt=0;
		if(!isset($_POST['btnadd']))
		{
		 require("addUI.php");
        }

        ?>


 <!--</DIV> -->



<input type="submit" name="btnres" value="Submit" class="button">
<input type="submit" name="btnadd" value="Add" class="button" onclick="addMore()">
<input type="submit" name="btnsave" value="Save" class="button">
</center>