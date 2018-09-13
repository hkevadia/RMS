<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header_ph.php";

echo '<div class="font">';

require_once "database.php";
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dpxyz" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz" ).datepicker("show");
         });
 $(function() {
            $( "#dpxyz1" ).datepicker({ dateFormat: "dd-mm-yy" });
            $( "#dpxyz1" ).datepicker("show");
         });
      </script>
<?php
if (!(isset($_SESSION['userid']))) {
    unset($_SESSION['userid']);
    //session_destroy();
    header('location:../index.php');
}
?>

<html>
    <head>
        <script>

            function selsub()
            {
                alert("sel sub");
                document.forms[0].action="sow_resdetails.php";
                document.forms[0].submit();
            }

            function addMore() {
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
    </head>
    <body>

        <form method="post" action="store_resdetails.php">

            <center>
                <br><br><br><br>
                <h2>SOW Resource Details for <?php
                    $qry = mysqli_query($con, "select vchproject_name from tbl_sow where vchproject_id='$_SESSION[projid]'");
                    $r = mysqli_fetch_array($qry);
                    echo $r['vchproject_name'];
                    ?></h2>
                <table class="t3">	
                    <tr><th>Desgination</th><th>No. of people</th><th>% Allocation</th><th>Billable</th><th>Non-billable</th><th>Start date</th><th>End Date</th></tr>
              
                    <tbody id="product"> 
                        <?php
                        $cnt = 0;
                        require("addUI.php");
                        ?>
                    </tbody>
                </table>
<br>
                <input type="submit" name="btnres" value="Submit" class="button"> 
                <input type="button" name="btnadd" value="Add" class="button" onclick="addMore()">
                <input type="submit" name="btnsave" value="Save" class="button"> 
            </center>
        </form>
    </body>
</html>
