<?php
/**
 * Model for user table
 */

/**
 * Login User
 *
 * @param string $email
 * @param string $pwd
 * @return array|bool
 */
function login_user ($email, $pwd) {
	global $db;

	$email = htmlspecialchars($email);
	$pwd   = md5($pwd);

	$sql = "SELECT *
			FROM `users`
			WHERE (`email` = '{$email}' AND `pwd` = '{$pwd}' AND `role` = 1)
			LIMIT 1";

	$rs = $db->query($sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}

/**
 * Get All Users
 *
 * @return array|bool|mysqli_result
 */
function get_users() {
	global $db;

	$sql = "SELECT *
			FROM `users`";

	$rs = $db->query($sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}
