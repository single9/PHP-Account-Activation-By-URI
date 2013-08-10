<?php 
require('config.php');

// Get hash code and username(for identify)
$token = $_GET['token'];
$username = $_GET['user'];

// MySQL 'WHERE' argument
$where = array('username' => $username);

// Select data form DB
$user_data = $db->Select(DB_TABLE, $where);

if(!$user_data) {
	echo 'Oops! Activation fail.<br />';
}

if(isset($token)) {
	// Check hash code
	if($user_data['activate_status'] == $token) {
		// Change activate_status to activated
		$set = array('activate_status' => 'activated');
		$result = $db-> Update('users', $set, $where);
		if($result) {
			echo 'Congratulations! You have been activated! <br />cheers :)';
		}
	} else {
		if($user_data['activate_status'] == 'activated') {
			echo 'Activated.';
		} else {
			echo 'Oops! Activation fail.<br />';
		}
	}
} else {
	echo 'Oops! Illegal link.<br />';
}

?>