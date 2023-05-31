<?php
include("inc/User.php");
$user = new User();
if (!empty($_POST['action']) && $_POST['action'] == 'login') {
	$userDetails = $user->login();
	if ($userDetails) {
		$message = "Logged in successfully";
		$status = 1;
	} else {
		$message = "Invalid Email/Password";
		$status = 0;
	}
	$jsonResponse = array(
		"message"	=> $message,
		"success" => $status
	);
	echo json_encode($jsonResponse);
}
if (!empty($_POST['action']) && $_POST['action'] == 'forgetPassword') {
	if ($_POST['userEmail'] == '' && $_POST['userName'] == '') {
		$message = "Please enter username or email to proceed with password reset";
		$status = 2;
	} else {
		$userDetails = $user->resetPassword();
		if ($userDetails) {
			$message = "Password reset link send. Please check your mailbox to reset password.";
			$status = 1;
		} else {
			$message = "No account exist with entered username and email address.";
			$status = 0;
		}
	}
	$jsonResponse = array(
		"message"	=> $message,
		"success" => $status
	);
	echo json_encode($jsonResponse);
}
if (!empty($_POST['action']) && $_POST['action'] == 'savePassword' && $_POST['authtoken']) {
	if ($_POST['newPassword'] != $_POST['confirmNewPassword']) {
		$message = "Password does not match the confirm password field";
		$status = 0;
	} else {
		$isPasswordSaved = $user->savePassword();
		if ($isPasswordSaved) {
			$message = "Password saved successfully.";
			$status = 1;
		} else {
			$message = "Invalid password change request.";
			$status = 0;
		}
	}
	$jsonResponse = array(
		"message"	=> $message,
		"success" => $status
	);
	echo json_encode($jsonResponse);
}
