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
			`users` (`email`, `pwd`, `name`, `phone`, `address`)
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
 * Login User
 *
 * @param string $email
 * @param string $pwd
 * @return array|bool
 */
function loginUser ($email, $pwd) {
	global $db;
	$email = htmlspecialchars(mysqli_real_escape_string ($db, $email));
	$pwd   = md5($pwd);

	$sql = "SELECT *
			FROM `users`
			WHERE (`email` = '{$email}' AND `pwd` = '{$pwd}')
			LIMIT 1";

	$rs = mysqli_query($db, $sql); // use query
	$rs = createSmartyRsArray($rs);
	$rs['success'] = (isset($rs[0])) ? 1 : 0;

	return $rs;
}


/**
 * Update User Data
 *
 * @param string $name
 * @param string $phone
 * @param string $address
 * @param string $pwd1
 * @param string $pwd2
 * @param string $curPwdMD5
 * @return boolean
 */
function update_user ($name, $phone, $address, $pwd1, $pwd2, $curPwdMD5) {
	global $db;
	$email   = htmlspecialchars(mysqli_real_escape_string ($db, $_SESSION['user']['email']));
	$name    = htmlspecialchars(mysqli_real_escape_string ($db, $name));
	$phone   = htmlspecialchars(mysqli_real_escape_string ($db, $phone));
	$address = htmlspecialchars(mysqli_real_escape_string ($db, $address));
	$pwd1    = trim($pwd1);
	$pwd2    = trim($pwd2);

	$newPwd = null;
	if ($pwd1 && ($pwd1 == $pwd2)) $newPwd = md5($pwd1);

	$sql = "UPDATE `users`
			SET ";
	if ($newPwd) {
		$sql .= "`pwd` = '{$newPwd}', ";
	}
	$sql .= "`name` = '{$name}',
			 `phone` = '{$phone}',
			 `address` = '{$address}'
			 WHERE
			  `email` = '{$email}' AND `pwd` = '{$curPwdMD5}'
			LIMIT 1";

	$rs = mysqli_query($db, $sql); // use query
//	var_dump($rs); exit;
	return $rs;
}


/**
 * Get orders for current user
 *
 * @return array
 */
function getCurUserOrders () {

	$userID = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
	$rs = get_orders_user($userID);

	return $rs;
}