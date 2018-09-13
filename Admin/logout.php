<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require_once "database.php";
if(isset($_SESSION['adminid']))
{
         date_default_timezone_set('Asia/Kolkata');
         $current=date("Y-m-d G:i:s");
         $log=mysqli_query($con,"insert into tbl_primary_log (vchemp_id,iaction_id,daction_time) values ('$_SESSION[adminid]','5','$current') ");
         if($log)
         {
	        if(session_destroy())
	        {
		        header('location:../index.php');
	        }
	        else
                {
	                header('location:../index.php');
	        }
         }
}
else
{
	echo "<center class=error>Logged in</center>";
}


?>	