<?php
/**
 * Model for user table
 */


/**
 * Register New User
 *
 * @param string $email
 * @param string $pwdMD5
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return array|bool|mysqli_result
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address) {
	global $db;
	$email   = htmlspecialchars(mysqli_real_escape_string ($db, $email));
	$name    = htmlspecialchars(mysqli_real_escape_string ($db, $name));
	$phone   = htmlspecialchars(mysqli_real_escape_string ($db, $phone));
	$address = htmlspecialchars(mysqli_real_escape_string ($db, $address));

	$sql = "INSERT INTO
			`users` (`email`, `pwd`, `name`, `phone`, `adress`)
			VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$address}')";

	$rs = mysqli_query($db, $sql); // use query

	if ($rs) {
		$sql = "SELECT * FROM users
				WHERE (`email` = '{$email}' AND `pwd` = '{$pwdMD5}')
				LIMIT 1";

		$rs = mysqli_query($db, $sql);
		$rs = createSmartyRsArray($rs);
		$rs['success'] = (isset($rs[0])) ? 1 : 0;

	} else {
		$rs['success'] = 0;
	}

	return $rs;
}


/**
 * @param string $email
 * @param string $pwd1
 * @param string $pwd2
 * @return array|null
 */
function checkRegisterParams($email, $pwd1, $pwd2) {

	$res = null;

	if (!$email) {
		$res['success'] = false;
		$res['message'] = __('Input email');
	}

	if (!$pwd1) {
		$res['success'] = false;
		$res['message'] = __('Input password');
	}

	if (!$pwd2) {
		$res['success'] = false;
		$res['message'] = __('Input password repeat');
	}

	if ($pwd1 != $pwd2) {
		$res['success'] = false;
		$res['message'] = __('Passwords do not match');
	}

	return $res;
}


/**
 * @param string $email
 * @return array
 */
function checkUserEmail($email) {

	global $db;
	$email = mysqli_real_escape_string($db, $email);
	$sql = "SELECT `id` FROM `users` WHERE `email` = '{$email}'";

	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}


/**
 * Logout User from system
 */
function logoutAction() {
	if (isset($_SESSION['user'])) {
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	}

	redirect('/');
}