<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

require_once "database.php";

$q=mysqli_query($con,"select * from tbl_resource_allocation where Srno='$_SESSION[srno1]'");
	while($r=mysqli_fetch_array($q))
	{
		$q1=mysqli_query($con,"select * from tbl_emp where vchemp_id='$r[req_from]' ");
		while($r1=mysqli_fetch_array($q1))
		{
			$q2=mysqli_query($con,"select * from tbl_project where vchproject_id='$r[vchproject_id]' ");
			while($r2=mysqli_fetch_array($q2))
			{
				$q3=mysqli_query($con,"select * from tbl_emp where vchemp_id='$r[allocated_emp_id]' ");
				while($r3=mysqli_fetch_array($q3))
				{
					$email2= $r1['vchemail'];
						$body2 = "Hello " . $r1['vchemp_Fname'] ." ". $r1['vchemp_Lname'] . "
Your request for Project " . $r2['vchproject_name'] . " is served and allocated employee is " . $r3['vchemp_Fname'] . " " . $r3['vchemp_Lname'] .".";

							/*
								This first bit sets the email address that you want the form to be submitted to.
								You will need to change this value to a valid email address that you can access.
								*/

								$webmaster_email = "infostretch@mail.com";
								require_once "database.php";
								$feedback_page = "error_message.html";
								$error_page = "error_message.html";
								$rdirect="res_allocation.php";


								function isInjected($str) {
									$injections = array('(\n+)',
									'(\r+)',
									'(\t+)',
									'(%0A+)',
									'(%0D+)',
									'(%08+)',
									'(%09+)'
									);
									$inject = join('|', $injections);
									$inject = "/$inject/i";
									if(preg_match($inject,$str)) {
										return true;
									}
									else {
										return false;
									}
								}

								// If the form fields are empty, redirect to the error page.
								if (empty($email2) || empty($body2)) {
								header( "Location: $error_page" );
								}

								// If email injection is detected, redirect to the error page.
								elseif ( isInjected($email2) ) {
								header( "Location: $error_page" );
								}

								// If we passed all previous tests, send the email then redirect to the thank you page.
								else {
								mail( "$email2", "Welcome to istretch",
								  $body2, "From: $webmaster_email" );
								header( "Location: home.php" );
								}
				}
			}
		}
	}

?>