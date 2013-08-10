<?php 

/*
 *	This PHP script is an example of registration. It's very simple and no security.
 *  DO NOT use this script for normal site.
 *
 */

require('config.php');

// $username is default E-mail Address
$username = $_POST['username'];
$password = $_POST['password'];

$ACT_URL = ACT_URL;

// Get date stamp
$date = date_create();
$date_timestamp = date_timestamp_get($date);

// Generate activation code
$activate_code = sha1($date_timestamp);
$activate_uri = $ACT_URL . 'activator.php?token=' . urlencode($activate_code) . '&user=' . urlencode($username);

// Array for DB insert
$add_var = array('username' => $username,
				 'password' => $password,
				 'activate_status' => $activate_code);

// Insert data to DB
$add_db = $db->Insert($add_var, DB_TABLE);

if(!$add_db) {
	echo '<p>Registration Fail.</p>';
	exit(0);
}

// $username is default E-mail Address
$to = $username;
// E-mail subject
$subject = 'Your Account Activation Link';
// E-mail content
$body = "

<p>Hi, </p>

<p>Your activation link is<br /> <a href=\"$activate_uri\">$activate_uri</a></p>

";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers
$headers .= 'From: Support <support@domainname.com>' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();;

$send_status = mail($to, $subject, $body, $headers);

if(!$send_status) {
	echo '<p>Mail send fail.</p>';
} else {
	echo '<p>Send Success!</p>';
    echo '<p>An activation link is send to your email.</p>';
}

?>