<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include "../header.php";

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
if (!(isset($_SESSION['adminid']))) {
    unset($_SESSION['adminid']);
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
                document.forms[1].action="sow_req.php";
                document.forms[1].submit();
            }

            function addMore() {
                $("<tbody>").load("addUI1.php", function () {
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
    <center>
        <br><br><br><br>
        
<form method="post">
<h2>SOW Resource Requirement</h2>
  <select name="selpid" class="textbox">
    <option value=''>Select Project</option>
    <?php
        $pqry=mysqli_query($con,"select * from tbl_sow where vchph='$_SESSION[adminid]' order by vchproject_name");
        while($rpid=mysqli_fetch_array($pqry))
        {
            ?>
            <option value="<?php echo $rpid['vchproject_id']; ?>" <?php if(isset($_POST['selpid'])){if($_POST['selpid']==$rpid['vchproject_id']){echo "selected";}} ?> > <?php echo $rpid['vchproject_id'] . "|" . $rpid['vchproject_name']; ?> </option>
<?php       }
    ?>
</select>&nbsp;&nbsp;
<input type="submit" name="subsel" value="OK" class="button">
</form>
<?php
    if(isset($_POST['subsel']) && $_POST['selpid']!='')
    {
?>
        <form method="post" action="store_resdetails1.php">
<?php
$_SESSION['projid']=$_POST['selpid'];
?>
         
                <br><br>
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
                        require("addUI1.php");
                        ?>
                    </tbody>
                </table>
<br>
                <input type="submit" name="btnres" value="Submit" class="button"> 
                <input type="button" name="btnadd" value="Add" class="button" onclick="addMore()">
                <input type="submit" name="btnsave" value="Save" class="button"> 
            </center>
        </form>
        <?php
    }
        ?>
    </body>
</html>
