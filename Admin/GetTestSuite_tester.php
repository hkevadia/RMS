<?php

include 'database.php';

if (isset($_GET['dept'])) {
    $dept = (string) filter_input(INPUT_GET, 'dept');
	//echo $dept;
}
$qry="select * from tbl_subdept where vchdept_id='$dept' order by vchSdept_name";
if ($result = $con->query($qry)) {
    echo "<label>Sub Department</label><select name='sdept' id='sdept' class='textbox' style='margin-left: 47%;'>";
    //echo "<option value=''>Select One</option>";
    $rows = $con->query($qry);
	while ($row = $rows->fetch_assoc()) 
	{
		?>
		<option value="<?php echo $row['vchSdept_id']; ?>" <?php if(isset($_POST['sdept'])){if($_POST['sdept']==$row['vchSdept_id']){echo "selected";}} ?> > <?php echo $row['vchSdept_name']; ?> </option>
		<?php
    }
	
    /*while ($row = $rows->fetch_assoc()) 
	{
        echo "<option value='{$row['vchSdept_id']}'>{$row['vchSdept_name']}</option>";
    }*/
    echo "</select>";
} else {
    echo '<script type="text/javascript">alert("There is something wrong. Try Again");window.self.close();</script>';
    header('Refresh: 0;url=rescreate.php');
}
?>