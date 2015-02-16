<?php
//get the first name
$fullname = Input::get('fullname');
$phone_number = Input::get('phone_number');
$email = Input::get ('email');
$subject = Input::get ('subject');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>
 
<h1>We been contacted by.... </h1>
 
<p>
Full Name: <?php echo ($fullname); ?> <br>
Phone number: <?php echo($phone_number);?><br>
Email address: <?php echo ($email);?> <br>
Subject: <?php echo ($subject); ?><br>
Message: <?php echo ($message);?><br>
Date: <?php echo($date_time);?><br>
User IP address: <?php echo($userIpAddress);?><br>
 
</p>