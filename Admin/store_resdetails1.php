<?php

include 'database.php';
include '../header.php';
session_start();
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['btnres'])) 
{

    $count = 0;
    $itemCount = count($_POST["txtno"]);
//echo $itemCount;
    for ($i = 0; $i < $itemCount; $i++) 
    {
        $txtno = $_POST["txtno"][$i];
        $perallo = htmlspecialchars($_POST["perallo"][$i]);
        //$rd1 = $_POST["rd1"][$i];
        $txtbill = $_POST["txtbill"][$i];
       // $startdate = htmlspecialchars($_POST["startdate"][$i]);
       // $enddate = htmlspecialchars($_POST["enddate"][$i]);
        $start_date =$_POST["startdate"][$i];
        $end_date = $_POST["enddate"][$i];
        $selnonbill = $_POST["selnonbill"][$i];
        $seldes = $_POST["seldes"][$i];
 
$date = $start_date;
                           $dd=date_create($date);
                           $startdate=date_format($dd,"Y-m-d");
                                 $date1 = $end_date;
                           $dd1=date_create($date1);
                           $enddate=date_format($dd1,"Y-m-d");
 //echo $i . " ";
        for($j=0;$j<$txtno;$j++)
        {
$q12=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_SESSION[projid]' ");
			$r12=mysqli_fetch_array($q12);

			if($enddate < $startdate )
			{
				echo "<script type='text/javascript'>";
				echo "alert('Select valid End Date')";
				echo "</script>";
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
			else if($startdate < $r12['dsow_startDate'])
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource Start date should be Grater than SOW Start date')";
				echo "</script>"; 
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
			else if($enddate > $r12['dsow_endDate'])
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource End date should be Less than SOW End date')";
				echo "</script>"; 
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
		else
{
                if($selnonbill != '')
                {
                            if ($selnonbill == 'NONBILL') 
                            {
                                //echo "in nonbill";
                                $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','-1','','$perallo','','','1','1')");
                    //            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
                    //                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
                    //                header('Refresh: 0;url=../index.php');
                    //            }
                    //            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
                            }
                            if ($selnonbill == 'ANBI') 
                            {
                                //echo "in nonbill";
                                $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','0','','$perallo','','','1','1')");
                    //            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
                    //                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
                    //                header('Refresh: 0;url=../index.php');
                    //            }
                    //            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
                            }
                            if ($selnonbill == 'ANBC') 
                            {
                                //echo "in nonbill";
                                $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','1','','$perallo','','','1','1')");
                    //            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
                    //                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
                    //                header('Refresh: 0;url=../index.php');
                    //            }
                    //            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
                            }
                }
                else
                {
                     if ($txtbill == '') 
					   {
                     $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','1','','','$perallo','','','1','1')");
        //            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`) VALUES (?,?, ?, ?, ?)")) == FALSE) {
        //                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
        //                header('Refresh: 0;url=../index.php');
        //            }
        //            $sql->bind_param('sssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '1');
					   }
					   else
					   {
                        $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','1','$txtbill','','$perallo','','','1','1')");
					   }
                }


           
        }
         if ($sql) 
            {
                $count++;
            }
}
    }

    if ($count > 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('SOW Resource Details Submitted successfully....')";
        echo "</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
}

if (isset($_POST['btnsave'])) 
{
   // echo "save save save";
   $count = 0;
    $itemCount = count($_POST["txtno"]);
    //echo $itemCount;
    for ($i = 0; $i < $itemCount; $i++) 
    {
        $txtno = $_POST["txtno"][$i];
        $perallo = htmlspecialchars($_POST["perallo"][$i]);
        //$rd1 = $_POST["rd1"][$i];
        $txtbill = $_POST["txtbill"][$i];
        //$startdate = htmlspecialchars($_POST["startdate"][$i]);
        //$enddate = htmlspecialchars($_POST["enddate"][$i]);
         $start_date =$_POST["startdate"][$i];
        $end_date = $_POST["enddate"][$i];
        $selnonbill = $_POST["selnonbill"][$i];
$seldes=$_POST["seldes"][$i];

$date = $start_date;
                           $dd=date_create($date);
                           $startdate=date_format($dd,"Y-m-d");
                                 $date1 = $end_date;
                           $dd1=date_create($date1);
                           $enddate=date_format($dd1,"Y-m-d");
 //echo $i . " ";
        for($j=0;$j<$txtno;$j++)
        {
                $q12=mysqli_query($con,"select * from tbl_sow where vchproject_id='$_SESSION[projid]' ");
			$r12=mysqli_fetch_array($q12);

			if($enddate < $startdate )
			{
				echo "<script type='text/javascript'>";
				echo "alert('Select valid End Date')";
				echo "</script>";
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
			else if($startdate < $r12['dsow_startDate'])
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource Start date should be Grater than SOW Start date')";
				echo "</script>"; 
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
			else if($enddate > $r12['dsow_endDate'])
			{
				echo "<script type='text/javascript'>";
				echo "alert('Resource End date should be Less than SOW End date')";
				echo "</script>"; 
				echo "<script>window.location.href='sow_req1.php';</script>";
			}
		else
{
				if( $selnonbill!='')
				{
						if ($selnonbill == 'NONBILL') 
						{
							//echo "in nonbill";
							$sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','-1','','$perallo','','','1','0')");
				//            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
				//                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
				//                header('Refresh: 0;url=../index.php');
				//            }
				//            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
						}
						if ($selnonbill == 'ANBI') 
						{
							//echo "in nonbill";
							$sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','0','','$perallo','','','1','0')");
				//            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
				//                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
				//                header('Refresh: 0;url=../index.php');
				//            }
				//            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
						}
						if ($selnonbill == 'ANBC') 
						{
							//echo "in nonbill";
							$sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,bnonbill_status,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','0','','1','','$perallo','','','1','0')");
				//            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`,`fbillability_per`,`vchskill_id`,`fper_allocation_req`,`req_from`, `allocated_emp_id`, `bsowreq`, `bsaved_status`) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) == FALSE) {
				//                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
				//                header('Refresh: 0;url=../index.php');




				//            }
				//            $sql->bind_param('ssssssssssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '0', '1', '', $perallo, '', '', '1', '1');
						}
				}
				else{
					if ($txtbill == '') 
					{
                     $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$s','1','','','$perallo','','','1','0')");
        //            if (($sql = $con->prepare("INSERT INTO db_res_allocation.tbl_resource_allocation (`vchproject_id`,`vchdesignation_id`,`dresource_startdate`,`dresource_enddate`,`b_bill_status`) VALUES (?,?, ?, ?, ?)")) == FALSE) {
        //                echo '<script type="text/javascript">alert("Something went wrong. Please try again");window.self.close();</script>';
        //                header('Refresh: 0;url=../index.php');
        //            }
        //            $sql->bind_param('sssss', $_SESSION['projid'], $selnonbill, $startdate, $enddate, '1');
					}
					else
					{
                    $sql = mysqli_query($con, "insert into tbl_resource_allocation (vchproject_id,vchdesignation_id,dresource_startdate,dresource_enddate,b_bill_status,fbillability_per,vchskill_id,fper_allocation_req,req_from,allocated_emp_id,bsowreq,bsaved_status) values ('$_SESSION[projid]','$seldes','$startdate','$enddate','1','$txtbill','','$perallo','','','1','0')");
					}
				}

           
        }
         if ($sql) 
            {
                $count++;
            }
}
    }

   if ($count > 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('SOW Resource Details Saved successfully....')";
        echo "</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
}
?>			