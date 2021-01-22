<?php
	require_once '../connection/connection.php';

	$username = $_REQUEST['txtusername'];
	$password = $_REQUEST['txtpassword'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$address = $_REQUEST['address'];
	$contact = $_REQUEST['contact'];
	$email = $_REQUEST['email'];
	$level = "customer";
	$verified = 0;


	$stmt = $conn->prepare("INSERT INTO account_tbl(cUsername, cPassword, cLevel)VALUES(:username, :password, :level)");
	$stmt->bindparam(":username", $username);
	$stmt->bindparam(":password", $password);
	$stmt->bindparam(":level", $level);
	$stmt->execute();


	$stmt = $conn->prepare("INSERT INTO user_tbl(cFname, cLname, cAddress, cContact, email, verified)VALUES(:fname, :lname, :address, :contact, :email, :ver)");
	$stmt->bindparam(":fname", $fname);
	$stmt->bindparam(":lname", $lname);
	$stmt->bindparam(":address", $address);
	$stmt->bindparam(":contact", $contact);
	$stmt->bindparam(":email", $email);
	$stmt->bindparam(":ver", $verified);
	$stmt->execute();

	// $verificationCode = md5(uniqid("1", true));

	//  // send the email verification
 //     $verificationLink = "localhost/craves/includes/activate.php?code=" . $verificationCode;

 //     $htmlStr = "";
 //                $htmlStr .= "Hi " . $email . ",<br /><br />";
 
 //                $htmlStr .= "Please click the button below to verify your subscription and have access to the craves avenue.<br /><br /><br />";
 //                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
 
 //                $htmlStr .= "Kind regards,<br />";
 //                $htmlStr .= "<a href='localhost/craves/' target='_blank'>The Code of a Ninja</a><br />";
 
 
 //                $name = "Craves Avenue";
 //                $email_sender = "johnarthurbadiango3011@gmail.com";
 //                $subject = "Verification Link | Craves Avenue | Subscription";
 //                $recipient_email = $email;
 
 //                $headers  = "MIME-Version: 1.0\r\n";
 //                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
 //                $headers .= "From: {$name} <{$email_sender}> \n";
 
 //                $body = $htmlStr;

 //                // send email using the mail function, you can also use php mailer library if you want
 //                if( mail($recipient_email, $subject, $body, $headers) ){
 // 					echo "<script>alert('Email Verification Code has been sent to your email')</script>";
                
 
 //                }else{
 //                    die("Sending failed.");
 //                }


	
	echo "<script>window.open('../index.php','_self')</script>";

?>